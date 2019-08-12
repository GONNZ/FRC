jQuery.extend(Messi, {

    alert: function (data, callback, options) {

        var buttons = [{
            id: 'ok',
            label: 'OK',
            val: 'OK'
        }];

        options = jQuery.extend(
            { closeButton: false, buttons: buttons, callback: function () {} },
            options,
            { show: true, unload: true, callback: callback }
        );

        return new Messi(data, options);

    },

    ask: function (data, callback, options) {

        var buttons = [
            { id: 'yes', label: 'Yes', val: 'Y', 'class': 'btn-success' },
            { id: 'no', label: 'No', val: 'N', 'class': 'btn-danger' }
        ];

        options = jQuery.extend(
            { closeButton: false, modal: true, buttons: buttons, callback: function () {} },
            options,
            { show: true, unload: true, callback: callback }
        );

        return new Messi(data, options);

    },

    img: function (src, options) {

        var img = new Image();

        jQuery(img).load(function () {

            var vp = {
                width: jQuery(window).width() - 50,
                height: jQuery(window).height() - 50
            };
            var ratio = (this.width > vp.width || this.height > vp.height) ?
                Math.min(vp.width / this.width, vp.height / this.height) :
                1;

            jQuery(img)
                .css({
                    width: this.width * ratio,
                    height: this.height * ratio
                });

            options = jQuery.extend(
                {
                    show:         true,
                    unload:       true,
                    closeButton:  true,
                    width:        this.width * ratio,
                    height:       this.height * ratio,
                    padding:      0
                },
                options
            );

            new Messi(img, options);

        })
        .error(function () {

            // Be IE friendly
            if (typeof window.console === 'object') {
                console.log('Error loading ' + src);
            }

        })
        .attr('src', src);

    },

    load: function (url, options) {

        options = jQuery.extend(
            { show: true, unload: true, params: {} },
            options
        );

        var request = {
            url: url,
            data: options.params,
            dataType: 'html',
            cache: false,
            error: function (request, status, error) {
                // Be IE friendly
                if (typeof window.console === 'object') {
                    console.log(request.responseText);
                }
            },
            success: function (html) {
                new Messi(html, options);
            }
        };

        jQuery.ajax(request);

    }

});
