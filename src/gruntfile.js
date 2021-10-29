module.exports = function (grunt) {
  grunt.initConfig({

  // define source files and their destinations
  uglify: {
    files: { 
      src: 'lib/*.js',  // source files mask
      dest: 'js/script.min.js',    // destination folder
      // expand: true,    // allow dynamic building
      // flatten: true,   // remove all unnecessary nesting
      // ext: '.min.js'   // replace .js to .min.js
    }
  },
  watch: {
    js:  { files: 'lib/*.js', tasks: [ 'uglify' ] },
  }
});

// load plugins
grunt.loadNpmTasks('grunt-contrib-watch');
grunt.loadNpmTasks('grunt-contrib-uglify');
grunt.loadNpmTasks('grunt-contrib-uglify-es');

// register at least this one task
grunt.registerTask('default', [ 'uglify' ]);


};

/**
 * 
 * install me using: 
 *
 * - npm install -g grunt-cli 
 * - creating 'package.json'
 * - paste below code
 * {
 *  "name": "my-project-name",
 *  "version": "1.0.0",
 *  "devDependencies": {
 *    "grunt": "~0.4.2",
 *    "grunt-contrib-uglify": "~0.2.4",
 *    "grunt-contrib-watch" : "~0.5.3"
 *  }
 * }
 * - paste this file at project root
 * - grunt watch --force
 * 
 */