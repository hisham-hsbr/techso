<script>
    $(document).ready(function() {
        // Set default language

        var defaultLanguage = "{{ app()->getLocale() }}";
        // var defaultLanguage = 'en';
        var languages = {
            'en': 'English',
            'ml': 'മലയാളം',
            'hi': 'हिंदी',
            'ar': 'عربي'
        };

        // Set the default language in the dropdown
        $('#selectedLanguage').text(languages[defaultLanguage]);

        // Handle dropdown item click
        $('.dropdown-item').click(function() {
            var selectedLang = $(this).data('lang');
            $('#selectedLanguage').text(languages[selectedLang]);
            // Add your language-changing logic here
            // alert('Language changed to: ' + selectedLang);
        });
    });
</script>
