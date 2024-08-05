<div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        <span id="selectedLanguage">English</span>
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" href="{{ route('lang', 'en') }}" data-lang="en">English</a>
        <a class="dropdown-item" href="{{ route('lang', 'ml') }}" data-lang="ml">മലയാളം</a>
        <a class="dropdown-item" href="{{ route('lang', 'hi') }}" data-lang="fr">हिंदी</a>
        <a class="dropdown-item" href="{{ route('lang', 'ar') }}" data-lang="fr">عربي</a>
    </div>
</div>
