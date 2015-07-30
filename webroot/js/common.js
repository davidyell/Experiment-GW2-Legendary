/**
 * Created by david on 30/07/15.
 */

/**
 * Build the window hash for the selected and populated inputs
 *
 * @return void
 */
function buildHash() {
    var values = [],
        id,
        val;

    $('.tree input[type=number]').each(function (i, e) {
        id = $(this).data('id');
        val = $(this).val();

        if (parseInt(val) > 0) {
            values.push(id + '=' + val);
        }
    });

    window.location.hash = "#" + values.join('&');
}

/**
 * If a window hash is passed to the page, it needs to populate the form
 *
 * @return void
 */
function processHash() {
    var hash = window.location.hash.replace('#', '').split('&'),
        parts,
        input,
        bar;

    if (window.location.hash != '') {
        $(hash).each(function (i, e) {
            parts = e.split('=');

            input = $('.tree input[data-id=' + parts[0] + ']');
            $(input).val(parts[1]);

            bar = $(input).siblings('.progress').children('.progress-bar');

            setProgress(bar, parts[1]);
        });
    }
}

/**
 * Update the progress bar and set the active class
 *
 * @param bar The progress-bar div
 * @param val Integer value
 */
function setProgress(bar, val) {
    var max = $(bar).parents('.progress').siblings('input[type=number]').attr('max'),
        percent = 0;

    if (parseInt(val) > 0) {
        percent = Math.round((parseInt(val) / max) * 100);
    }

    $(bar).attr('aria-valuenow', val).css('width', percent + '%').html(percent + "%");

    if (parseInt(percent) == 100) {
        $(bar).parents('span').addClass('complete');
    } else {
        $(bar).parents('span').removeClass('complete');
    }
}

/**
 * jQuery Dom Ready
 */
$(function () {

    processHash();

    $('input[type=number]').change(function (e) {
        var val = $(this).val(),
            bar = $(this).siblings('div.progress').children('div.progress-bar');

        setProgress(bar, val);
        buildHash();
    });

});