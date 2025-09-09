#!/bin/bash

# Debug Posts Issue
# Check why posts aren't showing in WordPress admin

echo "🔍 Debugging Posts Display Issue..."
echo "================================="

# TiDB Connection Settings
TIDB_HOST="gateway01.us-east-1.prod.aws.tidbcloud.com"
TIDB_PORT="4000"
TIDB_USER="L9yd9ZyWbWM7Miu.root"
TIDB_PASS="C7Ae65vPALxUUUsM"
TIDB_DB="test"

# Use LocalWP's MySQL client
MYSQL_PATH="/Applications/Local.app/Contents/Resources/extraResources/lightning-services/mysql-8.0.35+4/bin/darwin-arm64/bin/mysql"

echo "📊 Detailed Post Analysis:"
echo ""

"$MYSQL_PATH" \
    --connect-timeout 15 \
    -h $TIDB_HOST \
    -P $TIDB_PORT \
    -u "$TIDB_USER" \
    -p"$TIDB_PASS" \
    --ssl-mode=REQUIRED \
    $TIDB_DB << 'EOF'

-- Check all posts with details
SELECT 
    ID, 
    post_title, 
    post_status, 
    post_type, 
    post_author,
    post_date
FROM wp_posts 
WHERE post_type = 'post' 
ORDER BY post_date DESC;

-- Check user info
SELECT ID, user_login, user_email, display_name FROM wp_users;

-- Check user capabilities
SELECT 
    u.ID,
    u.user_login,
    um.meta_key,
    um.meta_value
FROM wp_users u
LEFT JOIN wp_usermeta um ON u.ID = um.user_id
WHERE um.meta_key IN ('wp_capabilities', 'wp_user_level');

-- Check if posts are assigned to existing users
SELECT 
    p.post_author,
    u.user_login,
    COUNT(*) as post_count
FROM wp_posts p
LEFT JOIN wp_users u ON p.post_author = u.ID
WHERE p.post_type = 'post'
GROUP BY p.post_author, u.user_login;

EOF