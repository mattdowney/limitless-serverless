#!/bin/bash

# Export Local WordPress Database
# This script exports your local WordPress database for migration to TiDB

echo "🗄️  Exporting Local WordPress Database..."
echo "============================================"

# LocalWP database settings from limitless.local
LOCAL_HOST="localhost"
LOCAL_SOCKET="/Users/mattdowney/Library/Application Support/Local/run/n9YrxsnhN/mysql/mysqld.sock"
LOCAL_USER="root"
LOCAL_PASS="root"
LOCAL_DB="local"

# Create filename with timestamp
TIMESTAMP=$(date +"%Y%m%d_%H%M%S")
EXPORT_FILE="wordpress_export_${TIMESTAMP}.sql"

echo "📊 Database Details:"
echo "   Host: $LOCAL_HOST:$LOCAL_PORT"
echo "   User: $LOCAL_USER"
echo "   Database: $LOCAL_DB"
echo "   Export file: $EXPORT_FILE"
echo ""

# Use LocalWP's MySQL tools
MYSQLDUMP_PATH="/Applications/Local.app/Contents/Resources/extraResources/lightning-services/mysql-8.0.35+4/bin/darwin-arm64/bin/mysqldump"

# Check if LocalWP mysqldump is available
if [ ! -f "$MYSQLDUMP_PATH" ]; then
    echo "❌ Error: LocalWP mysqldump not found at $MYSQLDUMP_PATH"
    echo "   Make sure LocalWP is installed and running."
    exit 1
fi

# Export the database
echo "⏳ Starting export..."
"$MYSQLDUMP_PATH" \
    --socket="$LOCAL_SOCKET" \
    -u $LOCAL_USER \
    -p$LOCAL_PASS \
    --single-transaction \
    --routines \
    --triggers \
    --add-drop-table \
    --comments \
    --create-options \
    --dump-date \
    --no-autocommit \
    --default-character-set=utf8mb4 \
    $LOCAL_DB > $EXPORT_FILE

# Check if export was successful
if [ $? -eq 0 ]; then
    echo "✅ Database exported successfully!"
    echo "📁 File: $EXPORT_FILE"
    echo "📏 Size: $(ls -lh $EXPORT_FILE | awk '{print $5}')"
    echo ""
    echo "🔄 Next step: Run './import-to-tidb.sh $EXPORT_FILE'"
else
    echo "❌ Export failed. Please check your database settings."
    exit 1
fi