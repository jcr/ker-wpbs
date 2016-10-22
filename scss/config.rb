##
# WP theme compass configuration
#
# Author: Jules Clement <jules@ker.bz>
#
require 'bootstrap-sass'
require 'compass/import-once/activate'

#########
# 1. Set this to the root of your project when deployed:
http_path = "/"

# 2. probably don't need to touch these
css_dir = "../css"
sass_dir = ""
images_dir = "../images"
fonts_dir = "../fonts"
javascripts_dir = "../js"
relative_assets = true

# don't touch this
preferred_syntax = :scss

# 3. Compilation
if (environment.nil?)
  environment = :production
end
sourcemap = (environment == :production) ? false : true
output_style = (environment == :production) ? :compact : :expanded
line_comments = (environment == :production) ? false : true
