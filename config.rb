require 'compass/import-once/activate'
require "fileutils"

http_path = "../"
css_dir = "css"
sass_dir = "sass"
images_dir = "img"
javascripts_dir = "js"

output_style = :compressed

on_stylesheet_saved do |file|
	if File.exists?(file)
		filename = File.basename(file, File.extname(file))
		File.rename(file, css_dir + "/" + filename + ".min" + File.extname(file))
	end
end