#!/bin/bash

# Export Local WordPress Database
# This script exports your local WordPress database for migration to TiDB

echo "🗄️  Exporting Local WordPress Database..."
echo "============================================"

# Common LocalWP database settings
# You may need to adjust these based on your LocalWP setup
LOCAL_HOST="localhost"
LOCAL_PORT="10003"  # Default LocalWP MySQL port
LOCAL_USER="root"
LOCAL_PASS="root"   # Default LocalWP MySQL password
LOCAL_DB="local"    # Your local database name - update this!

# Create filename with timestamp
TIMESTAMP=$(date +"%Y%m%d_%H%M%S")
EXPORT_FILE="wordpress_export_${TIMESTAMP}.sql"

echo "📊 Database Details:"
echo "   Host: $LOCAL_HOST:$LOCAL_PORT"
echo "   User: $LOCAL_USER"
echo "   Database: $LOCAL_DB"
echo "   Export file: $EXPORT_FILE"
echo ""

# Check if mysqldump is available
if ! command -v mysqldump &> /dev/null; then
    echo "❌ Error: mysqldump not found. Please install MySQL client tools."
    exit 1
fi

# Export the database
echo "⏳ Starting export..."
mysqldump \
    -h $LOCAL_HOST \
    -P $LOCAL_PORT \
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