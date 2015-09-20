module.exports = function(grunt) {

  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'), // Tell Grunt where the package file is

    /**
     * Sass
     */
    sass: {       // First task Grunt runs
      dev: {      // First Sass task
        options: {
          style: 'expanded',  // Create 'expanded' (human-readable) stylesheet
          sourcemap: 'none',  // No sourcemap (tells us where all different components come from)
        },
        files: {  // Second Sass task (grab these files and...)
          'style.readable.css': 'sass/style.scss',  // Grab style.scss from SCSS folder and compile into 'style.css' in the root folder
        }
      },
      dist: {     // What we're shipping with the Theme (a minimized style.css)
        options: {
          style: 'compressed',  // Create 'compressed' (minimized) stylesheet
          sourcemap: 'none',    // No sourcemap (tells us where all different components come from)
        },
        files: {  // Second Sass task (grab these files and...)
          'style.css': 'sass/style.scss',  // Grab style.scss from SCSS folder and compile into 'style.css' in the root folder
        }
      }
    },

    /**
     * Autoprefixer
     */
    autoprefixer: {
      options: {
        browsers: ['last 2 versions']
      },
      // prefix all files
      multiple_files: {
        expand: true,
        flatten: true,
        src: 'css/*.css',
        dest: ''    // destination = root folder
      }
    },

    /**
     * Watch task
     */
    watch: {    // First Grunt task
      css: {
        files: '**/*.scss', // Watch all files with a .scss suffix
        tasks: ['sass', 'autoprefixer']     // Run the Sass tasks on those items (can be an array of tasks)
      }
    },

  });
  grunt.loadNpmTasks('grunt-contrib-sass');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-autoprefixer');
  grunt.registerTask('default', ['watch']); // Name here is set to 'default' but can be anything

}