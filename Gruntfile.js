'use strict';

module.exports = function(grunt) {

	// Load grunt tasks automatically
	require('load-grunt-tasks')(grunt);

	// Time how long tasks take. Can help when optimizing build times
	require('time-grunt')(grunt);

	grunt.initConfig({

		// watch our project for changes
		watch: {
			js: {
				files: ['<%= jshint.all %>'],
				tasks: ['jshint', 'uglify:dev']
			},
			sass: {
				files: ['scss/{,*/}*.{scss,sass}'],
				tasks: ['sass:dev']
			},
			php: {
				files: ['*.php', 'functions/{,*/}*.php']
			},
			options: {
				livereload: true,
				spawn: false
			}
		},
		
		// let us know if our JS is sound
		jshint: {
			options: {
				jshintrc: '.jshintrc'
			},
			all: [
				'Gruntfile.js',
				'js/*.js'
			]
		},

		// concatenation and minification all in one
		uglify: {
			dev: {
				options: {
					mangle: false,
					compress: false,
					beautify: true
				},
				files: {
					'js/build/plugins.min.js': [
						'bower_components/bootstrap-sass/assets/javascripts/bootstrap/transition.js',
						'bower_components/bootstrap-sass/assets/javascripts/bootstrap/alert.js',
						'bower_components/bootstrap-sass/assets/javascripts/bootstrap/button.js',
						'bower_components/bootstrap-sass/assets/javascripts/bootstrap/carousel.js',
						'bower_components/bootstrap-sass/assets/javascripts/bootstrap/collapse.js',
						'bower_components/bootstrap-sass/assets/javascripts/bootstrap/dropdown.js',
						'bower_components/bootstrap-sass/assets/javascripts/bootstrap/modal.js',
						'bower_components/bootstrap-sass/assets/javascripts/bootstrap/tooltip.js',
						'bower_components/bootstrap-sass/assets/javascripts/bootstrap/popover.js',
						'bower_components/bootstrap-sass/assets/javascripts/bootstrap/scrollspy.js',
						'bower_components/bootstrap-sass/assets/javascripts/bootstrap/tab.js',
						'bower_components/bootstrap-sass/assets/javascripts/bootstrap/affix.js',
						'js/plugins/*.js'
					],
					'js/build/scripts.min.js': [
						'js/*.js'
					]
				}
			},
			dist: {
				options: {
					mangle: true,
					compress: true
				},
				files: {
					'js/build/plugins.min.js': [
						'bower_components/bootstrap-sass/assets/javascripts/bootstrap/transition.js',
						'bower_components/bootstrap-sass/assets/javascripts/bootstrap/alert.js',
						'bower_components/bootstrap-sass/assets/javascripts/bootstrap/button.js',
						'bower_components/bootstrap-sass/assets/javascripts/bootstrap/carousel.js',
						'bower_components/bootstrap-sass/assets/javascripts/bootstrap/collapse.js',
						'bower_components/bootstrap-sass/assets/javascripts/bootstrap/dropdown.js',
						'bower_components/bootstrap-sass/assets/javascripts/bootstrap/modal.js',
						'bower_components/bootstrap-sass/assets/javascripts/bootstrap/tooltip.js',
						'bower_components/bootstrap-sass/assets/javascripts/bootstrap/popover.js',
						'bower_components/bootstrap-sass/assets/javascripts/bootstrap/scrollspy.js',
						'bower_components/bootstrap-sass/assets/javascripts/bootstrap/tab.js',
						'bower_components/bootstrap-sass/assets/javascripts/bootstrap/affix.js',
						'js/plugins/*.js'
					],
					'js/build/scripts.min.js': [
						'js/*.js'
					]
				}
			}
		},

		sass: {
			dev: {
				options: {
					style: 'compressed',
					compass: true,
					lineNumbers: true
				},
				files: {
					'style.css' : 'scss/style.scss'
				}
			},
			dist: {
				options: {
					style: 'compressed',
					compass: true,
					sourcemap: 'none',
					lineNumbers: false
				},
				files: {
					'style.css' : 'scss/style.scss',
					'editor-style.css' : 'scss/editor-style.scss'
				}
			}
		}
		
	});

	// register task
	grunt.registerTask('default', [
		'jshint',
		'sass:dev',
		'uglify:dist',
		'watch'
	]);
	
	// register task
	grunt.registerTask('dist', [
		'jshint',
		'sass:dist',
		'uglify:dist'
	]);

};