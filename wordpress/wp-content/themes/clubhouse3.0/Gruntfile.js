module.exports = function(grunt) {

  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    concat: {
      options: {
        separator: ';'
      },
      dist: {
        src: ['js/*.js'],
        dest: 'production/js/site.min.js'
      }
    },
	  compass: {                  // Task
	    dist: {                   // Target
	      options: {              // Target options
	        sassDir: 'scss',
	        cssDir: 'css',
	        environment: 'production'
	      }
	    },
	    dev: {                    // Another target
	      options: {
	        sassDir: 'sass',
	        cssDir: 'css'
	      }
	    }
	  }
  });
  
  grunt.loadNpmTasks('grunt-contrib-concat');
  grunt.loadNpmTasks('grunt-contrib-compass');
  
  
  grunt.registerTask('default', ['concat', 'compass']);

};