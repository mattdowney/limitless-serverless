# Upload Files for ServerlessWP

This directory contains media files uploaded to WordPress.

## Missing Images
The following images are referenced in the database but files are missing:
- introducing-limitless-1.jpg
- cta-1.jpg
- Other blog post featured images

## Solutions
1. **Upload original images** to this directory
2. **Set up S3 storage** for proper media handling in serverless environment
3. **Use placeholder images** until originals are available

## Note
ServerlessWP doesn't persistently store uploaded files between deployments.
For production, use S3 or similar storage service.