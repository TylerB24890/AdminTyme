module.exports = {
	main: {
		options: {
			mode: 'zip',
			archive: './release/tyme.<%= pkg.version %>.zip'
		},
		expand: true,
		cwd: 'release/<%= pkg.version %>/',
		src: ['**/*'],
		dest: 'tyme/'
	}
};