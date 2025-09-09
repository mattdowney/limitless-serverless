#!/bin/bash

# Hostinger Server Setup Script
# Run this script to set up the Git repository on your Hostinger server

echo "🚀 Setting up Limitless theme on Hostinger server..."
echo "Server: 151.106.110.29:65002"
echo "Username: u333982692"
echo ""

# Connect to server and run setup commands
ssh -p 65002 u333982692@151.106.110.29 << 'ENDSSH'
    echo "📂 Navigating to themes directory..."
    cd /public_html/wp-content/themes/
    
    echo "🗑️  Removing existing limitless directory..."
    rm -rf limitless
    
    echo "📥 Cloning repository from GitHub..."
    git clone https://github.com/mattdowney/limitless.git limitless
    
    echo "📁 Entering theme directory..."
    cd limitless
    
    echo "📦 Installing Node.js dependencies..."
    npm install
    
    echo "🎨 Building CSS..."
    npm run build:css
    
    echo "✅ Setup complete!"
    echo "Current directory contents:"
    ls -la
ENDSSH

echo ""
echo "🎉 Server setup completed!"
echo "Now any push to main branch will automatically deploy."