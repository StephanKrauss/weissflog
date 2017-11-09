<div class="row">
    {% for category in categories %}
        <div class="col-md-5 icon">
            <a href="/kategorie/{{category.link}}" class="kategoryLink">
                <div class="focus-border">
                    <div class="focus-layout">
                        <div class="focus-image"><img src="/buttons/{{category.image}}"></div>
                        <span class="kategoryLink">{{category.description}}</span>
                    </div>
                </div>
            </a>
        </div>
    {% endfor %}
</div>