# Limitless Theme → Vercel Deployment

Complete workflow for deploying your Limitless WordPress theme to Vercel with TiDB database.

## 🚀 Quick Start

### 1. Export & Import Database

```bash
# Export your local WordPress database
./export-local-db.sh

# Import to TiDB Cloud
./import-to-tidb.sh
```

### 2. Set Vercel Environment Variables

Go to [Vercel Dashboard](https://vercel.com/mattdowney/limitless-serverless/settings/environment-variables) and add:

```
DATABASE=test
USERNAME=L9yd9ZyWbWM7Miu.root
PASSWORD=C7Ae65vPALxUUUsM
HOST=gateway01.us-east-1.prod.aws.tidbcloud.com
TABLE_PREFIX=wp_
```

### 3. Deploy Theme

```bash
# Sync theme and auto-deploy to Vercel
./sync-to-serverless.sh
```

### 4. Activate Theme

1. Visit: https://limitless-serverless.vercel.app/wp-admin
2. Login with your WordPress admin credentials
3. Go to Appearance → Themes
4. Activate "Limitless" theme

## 📁 Files Created

- `export-local-db.sh` - Export local WordPress database
- `import-to-tidb.sh` - Import database to TiDB Cloud  
- `sync-to-serverless.sh` - Sync theme to GitHub & trigger Vercel deploy
- `.env.vercel` - Environment variables template
- `.github/workflows/sync-to-vercel.yml` - Auto-sync on Git push

## 🔄 Development Workflow

1. **Local Development**: Use LocalWP or WordPress Studio
2. **Theme Changes**: Make changes to your theme files
3. **Database Updates**: Export local DB → Import to TiDB (as needed)
4. **Deploy**: Run `./sync-to-serverless.sh` or push to main branch
5. **Auto-Deploy**: GitHub Actions syncs to serverless repo → Vercel deploys

## 🌐 URLs

- **Live Site**: https://limitless-serverless.vercel.app
- **WordPress Admin**: https://limitless-serverless.vercel.app/wp-admin
- **GitHub Repo**: https://github.com/mattdowney/limitless-serverless
- **Vercel Dashboard**: https://vercel.com/mattdowney/limitless-serverless

## 🗄️ Database Info

- **Provider**: TiDB Cloud
- **Host**: gateway01.us-east-1.prod.aws.tidbcloud.com:4000
- **Database**: test
- **SSL**: Required

## ⚡ Features

- ✅ Serverless WordPress on Vercel
- ✅ TiDB Cloud MySQL-compatible database
- ✅ Automatic deployments via GitHub Actions
- ✅ Local development with LocalWP
- ✅ CSS build pipeline with Tailwind
- ✅ File sync with rsync (excludes unnecessary files)

## 🛠️ Troubleshooting

### Database Connection Issues
- Verify TiDB credentials in Vercel environment variables
- Ensure SSL is enabled for TiDB connection
- Check database import was successful

### Theme Not Appearing
- Confirm theme files are in `wp/wp-content/themes/limitless/`
- Check Vercel deployment logs for errors
- Verify file permissions and structure

### Build Failures
- Check GitHub Actions logs
- Ensure npm dependencies install correctly
- Verify CSS build process completes

Need help? Check the [ServerlessWP documentation](https://github.com/mitchmac/serverlesswp) or [TiDB Cloud docs](https://docs.pingcap.com/tidbcloud/).