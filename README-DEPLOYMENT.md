# Limitless Serverless WordPress Deployment Guide

This is a serverless WordPress deployment using the Limitless theme, built on ServerlessWP.

## Quick Deploy to Vercel

1. **Fork/Clone this repository** to your GitHub account

2. **Deploy to Vercel**:
   - Go to [Vercel](https://vercel.com/new)
   - Import your GitHub repository
   - Vercel will automatically detect the configuration from `vercel.json`

3. **Set up Database** - Choose one option:

### Option A: MySQL/MariaDB (Recommended for Production)

**TiDB Serverless (Free Tier):**
1. Sign up at [TiDB Cloud](https://www.pingcap.com/tidb-cloud-serverless/)
2. Create a new serverless cluster
3. Get connection details and add to Vercel environment variables:

```
DATABASE=your_database_name
USERNAME=your_username
PASSWORD=your_password
HOST=your_tidb_host
TABLE_PREFIX=wp_
```

### Option B: SQLite + S3 (Experimental - Good for Dev)

1. Create an S3 bucket (or compatible service like Cloudflare R2)
2. Add these environment variables in Vercel:

```
SQLITE_S3_BUCKET=your-bucket-name
SQLITE_S3_API_KEY=your-s3-access-key
SQLITE_S3_API_SECRET=your-s3-secret-key
SQLITE_S3_REGION=us-east-1
```

4. **Configure Media Uploads (Optional)**:
   - For file uploads, add S3 credentials:
   ```
   S3_KEY_ID=your_s3_access_key_id
   S3_ACCESS_KEY=your_s3_secret_access_key
   ```

5. **Deploy and Setup**:
   - After deployment, visit your site
   - Complete WordPress installation
   - Activate the "Limitless" theme in wp-admin
   - Configure your site settings

## Features

- **Limitless Theme**: Complete email design service theme
- **Serverless**: Runs on Vercel with 60-second timeout
- **TailwindCSS**: Modern utility-first styling
- **SEO Optimized**: Custom meta functions and structured data
- **Performance**: Aggressive CDN caching headers
- **Mobile Responsive**: Works perfectly on all devices
- **Analytics**: OpenPanel integration ready

## Theme Structure

- `/wp/wp-content/themes/limitless/` - Main theme files
- Built CSS in `css/main-min.css`
- All assets (images, fonts, JS) included
- Template parts for modular design

## Environment Variables Reference

Copy `.env.example` and configure for your deployment:

### Required (Choose one database option)
```bash
# MySQL Option
DATABASE=your_db_name
USERNAME=your_db_user
PASSWORD=your_db_password
HOST=your_db_host

# OR SQLite+S3 Option
SQLITE_S3_BUCKET=your_bucket
SQLITE_S3_API_KEY=your_key
SQLITE_S3_API_SECRET=your_secret
SQLITE_S3_REGION=your_region
```

### Optional
```bash
# Media uploads
S3_KEY_ID=your_s3_key
S3_ACCESS_KEY=your_s3_secret

# Database customization
TABLE_PREFIX=wp_
DB_COLLATE=utf8mb4_general_ci
SKIP_MYSQL_SSL=true
```

## Performance Optimizations

The theme includes serverless-specific optimizations:
- Cache headers for CDN (1hr pages, 30min posts, 15min archives)
- Disabled file modifications (required for serverless)
- SQLite+S3 cron optimization
- Compressed CSS and optimized assets

## Local Development

1. Clone the repository
2. Install dependencies: `npm install`
3. Set up local WordPress with the theme
4. Use `npm run dev` in theme folder for CSS watching

## Support

For ServerlessWP issues: [ServerlessWP GitHub](https://github.com/mitchmac/serverlesswp)
For Limitless theme customization: Check the original theme documentation

## Architecture

- **Frontend**: Vercel Edge Functions
- **Backend**: PHP 8.3 in serverless functions
- **Database**: TiDB/MySQL or SQLite+S3
- **CDN**: Vercel global edge network
- **Media**: S3-compatible storage