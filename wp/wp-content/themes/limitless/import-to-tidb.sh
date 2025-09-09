#!/bin/bash

# Import WordPress Database to TiDB
# This script imports your WordPress database dump to TiDB Cloud

echo "🗄️  Importing WordPress Database to TiDB..."
echo "==========================================="

# TiDB Connection Settings
TIDB_HOST="gateway01.us-east-1.prod.aws.tidbcloud.com"
TIDB_PORT="4000"
TIDB_USER="L9yd9ZyWbWM7Miu.root"
TIDB_PASS="C7Ae65vPALxUUUsM"
TIDB_DB="test"

# Get SQL file from command line argument or use latest export
if [ -n "$1" ]; then
    SQL_FILE="$1"
else
    # Find the most recent wordpress_export file
    SQL_FILE=$(ls -t wordpress_export_*.sql 2>/dev/null | head -1)
    if [ -z "$SQL_FILE" ]; then
        echo "❌ No SQL file specified and no wordpress_export_*.sql files found."
        echo "Usage: $0 [sql_file.sql]"
        echo "Or run ./export-local-db.sh first"
        exit 1
    fi
fi

# Check if SQL file exists
if [ ! -f "$SQL_FILE" ]; then
    echo "❌ SQL file not found: $SQL_FILE"
    exit 1
fi

echo "📊 Import Details:"
echo "   TiDB Host: $TIDB_HOST:$TIDB_PORT"
echo "   Database: $TIDB_DB"
echo "   SQL File: $SQL_FILE"
echo "   File Size: $(ls -lh "$SQL_FILE" | awk '{print $5}')"
echo ""

# Check if mysql client is available
if ! command -v mysql &> /dev/null; then
    echo "❌ Error: mysql client not found. Please install MySQL client tools."
    exit 1
fi

# Test connection first
echo "🔗 Testing TiDB connection..."
mysql \
    --connect-timeout 15 \
    -h $TIDB_HOST \
    -P $TIDB_PORT \
    -u "$TIDB_USER" \
    -p"$TIDB_PASS" \
    --ssl-mode=REQUIRED \
    -e "SELECT 'Connection successful' as status;" \
    $TIDB_DB

if [ $? -ne 0 ]; then
    echo "❌ Failed to connect to TiDB. Please check your credentials."
    exit 1
fi

echo "✅ Connection successful!"
echo ""

# Confirm before proceeding
read -p "⚠️  This will overwrite existing data in the TiDB database. Continue? (y/N): " -n 1 -r
echo ""
if [[ ! $REPLY =~ ^[Yy]$ ]]; then
    echo "❌ Import cancelled."
    exit 1
fi

# Import the database
echo "⏳ Importing database... (this may take a few minutes)"
mysql \
    --connect-timeout 15 \
    -h $TIDB_HOST \
    -P $TIDB_PORT \
    -u "$TIDB_USER" \
    -p"$TIDB_PASS" \
    --ssl-mode=REQUIRED \
    --default-character-set=utf8mb4 \
    $TIDB_DB < "$SQL_FILE"

# Check if import was successful
if [ $? -eq 0 ]; then
    echo "✅ Database imported successfully to TiDB!"
    echo ""
    echo "🔄 Next steps:"
    echo "   1. Set Vercel environment variables"
    echo "   2. Run './sync-to-serverless.sh' to deploy your theme"
else
    echo "❌ Import failed. Please check the error messages above."
    exit 1
fi