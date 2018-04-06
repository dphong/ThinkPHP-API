var express = require('express');
var router = express.Router();
var formidable = require('formidable');

/* GET home page. */
// router.get('/', function(req, res, next) {
// 	res.render('index');
// });

router.get('/test', function(req, res, next) {
	res.render('test');
});

router.post('/upload', (req, res, next) => {
	var form = new formidable.IncomingForm();

	form.parse(req, (err, fields, files) => {
		if (err)
			throw err;
		if (files || fields) {
			var name = files["files[]"].name;
			res.json({
				success: true,
				name: name
			});
		}
	})
});

module.exports = router;