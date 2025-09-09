#!/bin/bash

# Fix WordPress Site URLs in TiDB
# This script updates the site URLs from local to the Vercel deployment

echo "🔧 Fixing WordPress Site URLs..."
echo "================================"

# TiDB Connection Settings
TIDB_HOST="gateway01.us-east-1.prod.aws.tidbcloud.com"
TIDB_PORT="4000"
TIDB_USER="L9yd9ZyWbWM7Miu.root"
TIDB_PASS="C7Ae65vPALxUUUsM"
TIDB_DB="test"

# Use LocalWP's MySQL client
MYSQL_PATH="/Applications/Local.app/Contents/Resources/extraResources/lightning-services/mysql-8.0.35+4/bin/darwin-arm64/bin/mysql"

# URLs to update
OLD_URL="http://limitless.local"
NEW_URL="https://limitless-serverless.vercel.app"

echo "📊 Update Details:"
echo "   From: $OLD_URL"
echo "   To: $NEW_URL"
echo ""

# Update site URLs in wp_options table
echo "⏳ Updating site URLs..."

"$MYSQL_PATH" \
    --connect-timeout 15 \
    -h $TIDB_HOST \
    -P $TIDB_PORT \
    -u "$TIDB_USER" \
    -p"$TIDB_PASS" \
    --ssl-mode=REQUIRED \
    $TIDB_DB << EOF

-- Update WordPress site URLs
UPDATE wp_options SET option_value = '$NEW_URL' WHERE option_name = 'home';
UPDATE wp_options SET option_value = '$NEW_URL' WHERE option_name = 'siteurl';

-- Update post content URLs (if any)
UPDATE wp_posts SET post_content = REPLACE(post_content, '$OLD_URL', '$NEW_URL');

-- Update metadata URLs (if any)
UPDATE wp_postmeta SET meta_value = REPLACE(meta_value, '$OLD_URL', '$NEW_URL');

-- Show updated values
SELECT option_name, option_value FROM wp_options WHERE option_name IN ('home', 'siteurl');

EOF

if [ $? -eq 0 ]; then
    echo "✅ Site URLs updated successfully!"
    echo ""
    echo "🔄 Next steps:"
    echo "   1. Refresh your WordPress admin page"
    echo "   2. Check if posts are now visible"
    echo "   3. Go to Appearance → Themes to activate Limitless theme"
else
    echo "❌ Failed to update URLs. Please check the error messages above."
    exit 1
fi