const chokidar = require('chokidar');
const { exec } = require('child_process');

// Watch specific directories
chokidar
  .watch(['./**/*.php', './css/**/*.css', './js/**/*.js', './template-parts/**/*.php'], {
    ignored: /(^|[\/\\])\../, // ignore dotfiles
    persistent: true,
  })
  .on('change', path => {
    console.log(`File ${path} has been changed`);
    exec('npm run watch', (error, stdout, stderr) => {
      if (error) {
        console.error(`exec error: ${error}`);
        return;
      }
      console.log(`stdout: ${stdout}`);
      console.error(`stderr: ${stderr}`);
    });
  });
