Goals
=====

Take Messi and move it to the next level.  Also support IE9+.

If you are interested in helping, send me Pull Requests and I'll
review them.  Where appropriate, I'll try to add the Pull Requests
that have been already issued for the original Messi repo.

Preparing for 2.0 Final
-----------------------
* [ ] 95% Code Coverage or better
* [ ] Write the documentation
* :white_check_mark: Write CONTRIBUTING.md
* :white_check_mark: Add a LICENSE file
* :white_check_mark: Update package.json
* :white_check_mark: Add css minification.

Preparing for 2.0 Beta
----------------------
* [ ] Preliminary documentation
* [ ] Figure out distribution, releases, bower, etc.
* :white_check_mark: Greater than 90% Code Coverage
* :white_check_mark: Banners for messi.js and messi.min.js (also css?)
* :white_check_mark: Examine Open Issues: Currently there are 38 Open Issues
* :white_check_mark: Complete the Issue tests
* :white_check_mark: Update package.json
* :white_check_mark: Add Code Style checks for JSHint.

Preliminary Fixes
-----------------
* :white_check_mark: In the current build, the messi.min.js works but the messi.js is broken.
* :white_check_mark: A guplfile.js needs to be created to manage testing and minifying.
* :white_check_mark: Tests—preferably in Mocha—need to be written.
* :white_check_mark: Messi does not play nice with other Javascript.  It needs to be wrapped in an IIFE so it's no longer in the global scope. See PR27 & PR28. 

Pull Requests from original Messi
---------------------------------
* :white_check_mark: https://github.com/marcosesperon/Messi/pull/26 – Added Box Name _NOTE: There are better ways to do this. E.g. hide()_
* :white_check_mark: https://github.com/marcosesperon/Messi/pull/27 – Bad Integration with jQuery patch-1
* :white_check_mark: https://github.com/marcosesperon/Messi/pull/28 – Bad Integration with jQuery patch-2
* :white_check_mark: https://github.com/marcosesperon/Messi/pull/29 – Fixed: width buttons on Firefox
* :white_check_mark: https://github.com/marcosesperon/Messi/pull/30 – Fix to enable the callbacks
* :white_check_mark: https://github.com/marcosesperon/Messi/pull/31 – Remove extra comma
* :white_check_mark: https://github.com/marcosesperon/Messi/pull/32 – updated messi.js to correct when messi appears off page
* [x] https://github.com/marcosesperon/Messi/pull/33 – add click to close feature _This will likely be added. Not before 2.1, however._
* :white_check_mark: https://github.com/marcosesperon/Messi/pull/35 - Update messi.css (for Firefox 23.0.1) _IGNORED: This fix was causing the buttons to appear incorrectly in Firefox 27.0.1_
* :white_check_mark: https://github.com/marcosesperon/Messi/pull/36 - fix unload and modal
* :white_check_mark: https://github.com/marcosesperon/Messi/pull/38 - Controlling the resizing and scrolling the screen to adjust the message in the user's field of view.
