#!/bin/bash

# Sync Limitless Theme to ServerlessWP
# This script copies the theme to the limitless-serverless repo and pushes to GitHub

echo "🚀 Syncing Limitless Theme to ServerlessWP..."
echo "============================================="

REPO_URL="https://github.com/mattdowney/limitless-serverless.git"
REPO_DIR="/tmp/limitless-serverless-deploy"
THEME_PATH="wp/wp-content/themes/limitless"

echo "📂 Repository: $REPO_URL"
echo "🎨 Theme path: $THEME_PATH"
echo ""

# Check if we're in the theme directory
if [ ! -f "style.css" ] || [ ! -f "functions.php" ]; then
    echo "❌ Error: This doesn't appear to be a WordPress theme directory."
    echo "   Make sure you're running this from the theme root (where style.css is located)."
    exit 1
fi

# Clone or update the serverless repo
if [ -d "$REPO_DIR" ]; then
    echo "📥 Updating existing repository..."
    cd "$REPO_DIR"
    git pull origin main
    if [ $? -ne 0 ]; then
        echo "❌ Failed to update repository. Please check your Git credentials."
        exit 1
    fi
    cd ..
else
    echo "📥 Cloning serverless repository..."
    git clone "$REPO_URL" "$REPO_DIR"
    if [ $? -ne 0 ]; then
        echo "❌ Failed to clone repository. Please check your Git credentials."
        exit 1
    fi
fi

# Create theme directory if it doesn't exist
FULL_THEME_PATH="$REPO_DIR/$THEME_PATH"
mkdir -p "$FULL_THEME_PATH"

echo "📋 Copying theme files..."

# Copy all files except git, node_modules, and build artifacts
rsync -av \
    --exclude='.git*' \
    --exclude='node_modules/' \
    --exclude='limitless-serverless/' \
    --exclude='serverlesswp/' \
    --exclude='*.log' \
    --exclude='.DS_Store' \
    --exclude='wordpress_export_*.sql' \
    --progress \
    . "$FULL_THEME_PATH/"

if [ $? -ne 0 ]; then
    echo "❌ Failed to copy theme files."
    exit 1
fi

echo "✅ Theme files copied successfully!"

# Build CSS if needed
if [ -f "$FULL_THEME_PATH/package.json" ]; then
    echo "🎨 Building CSS..."
    cd "$FULL_THEME_PATH"
    if command -v npm &> /dev/null; then
        npm install --silent
        npm run build:css
        echo "✅ CSS built successfully!"
    else
        echo "⚠️  npm not found. CSS build skipped."
    fi
    cd - > /dev/null
fi

# Commit and push changes
cd "$REPO_DIR"

echo "📤 Committing changes..."

git add .
git status

# Check if there are changes to commit
if git diff --cached --quiet; then
    echo "ℹ️  No changes to commit. Theme is already up to date."
else
    COMMIT_MESSAGE="Update Limitless theme - $(date '+%Y-%m-%d %H:%M:%S')"
    git commit -m "$COMMIT_MESSAGE"
    
    echo "🚀 Pushing to GitHub..."
    git push origin main
    
    if [ $? -eq 0 ]; then
        echo "✅ Theme successfully synced to GitHub!"
        echo ""
        echo "🎉 Vercel will automatically deploy your changes."
        echo "🔗 Check your deployment at: https://limitless-serverless.vercel.app"
        echo ""
        echo "🔄 Next steps:"
        echo "   1. Set Vercel environment variables (if not done yet)"
        echo "   2. Wait for deployment to complete"
        echo "   3. Visit /wp-admin to activate your theme"
    else
        echo "❌ Failed to push to GitHub. Please check your credentials."
        exit 1
    fi
fi

cd - > /dev/null