module.exports = {
	dist: {
		options: {
			processors: [
				require('autoprefixer')({browsers: 'last 2 versions'})
			]
		},
		files: { 
			'assets/css/tyme-admin.css': [ 'assets/css/tyme-admin.css' ]
		}
	}
};