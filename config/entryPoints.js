const path = require('path');

let project = new Object();
project.root = path.resolve('./');
project.scripts = path.resolve(project.root, 'resources/scripts/src');
project.components = path.resolve( project.root, 'resources/scripts/src/components');
project.pages = path.resolve( project.root, 'resources/scripts/src/pages');

module.exports = {
  entry: {
    // Universally-needed JS
    universal: path.resolve(project.scripts, 'universal.js'),
    // Page template JS
    404: path.resolve(project.pages, '404.js'),
    homepage: path.resolve(project.pages, 'homepage.js'),
    // Component JS
  }
}
