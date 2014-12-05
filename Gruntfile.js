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
				files: ['sass/{,*/}*.{scss,sass}'],
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
						'js/plugins/bootstrap/transition.js',
						'js/plugins/bootstrap/alert.js',
						'js/plugins/bootstrap/button.js',
						'js/plugins/bootstrap/carousel.js',
						'js/plugins/bootstrap/collapse.js',
						'js/plugins/bootstrap/dropdown.js',
						'js/plugins/bootstrap/modal.js',
						'js/plugins/bootstrap/tooltip.js',
						'js/plugins/bootstrap/popover.js',
						'js/plugins/bootstrap/scrollspy.js',
						'js/plugins/bootstrap/tab.js',
						'js/plugins/bootstrap/affix.js',
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
						'js/plugins/bootstrap/transition.js',
						'js/plugins/bootstrap/alert.js',
						'js/plugins/bootstrap/button.js',
						'js/plugins/bootstrap/carousel.js',
						'js/plugins/bootstrap/collapse.js',
						'js/plugins/bootstrap/dropdown.js',
						'js/plugins/bootstrap/modal.js',
						'js/plugins/bootstrap/tooltip.js',
						'js/plugins/bootstrap/popover.js',
						'js/plugins/bootstrap/scrollspy.js',
						'js/plugins/bootstrap/tab.js',
						'js/plugins/bootstrap/affix.js',
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
					'style.css' : 'sass/style.scss'
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
					'style.css' : 'sass/style.scss',
					'editor-style.css' : 'sass/editor-style.scss'
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