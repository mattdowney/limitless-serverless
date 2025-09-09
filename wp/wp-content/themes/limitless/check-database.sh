#!/bin/bash

# Check TiDB Database Contents
# This script checks what tables and data exist in TiDB

echo "🔍 Checking TiDB Database Contents..."
echo "===================================="

# TiDB Connection Settings
TIDB_HOST="gateway01.us-east-1.prod.aws.tidbcloud.com"
TIDB_PORT="4000"
TIDB_USER="L9yd9ZyWbWM7Miu.root"
TIDB_PASS="C7Ae65vPALxUUUsM"
TIDB_DB="test"

# Use LocalWP's MySQL client
MYSQL_PATH="/Applications/Local.app/Contents/Resources/extraResources/lightning-services/mysql-8.0.35+4/bin/darwin-arm64/bin/mysql"

echo "📊 Database Analysis:"
echo ""

"$MYSQL_PATH" \
    --connect-timeout 15 \
    -h $TIDB_HOST \
    -P $TIDB_PORT \
    -u "$TIDB_USER" \
    -p"$TIDB_PASS" \
    --ssl-mode=REQUIRED \
    $TIDB_DB << 'EOF'

-- Show all tables
SHOW TABLES;

-- Check posts table
SELECT COUNT(*) as post_count FROM wp_posts WHERE post_type = 'post' AND post_status = 'publish';

-- Check users table
SELECT COUNT(*) as user_count FROM wp_users;

-- Check site URLs
SELECT option_name, option_value FROM wp_options WHERE option_name IN ('home', 'siteurl', 'template', 'stylesheet');

-- Show a few post titles to verify content
SELECT post_title, post_status, post_type FROM wp_posts WHERE post_type IN ('post', 'page') LIMIT 5;

EOF