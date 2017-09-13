<div class="row">
    {% for category in categories %}
        <div class="col-md-5 icon">
            <a href="/kategorie/{{category.link}}" class="kategoryLink">
                <div class="focus-border">
                    <div class="focus-layout">
                        <div class="focus-image"><img src="/buttons/{{category.image}}"></div>
                        <h4 class="clrchg">{{category.description}}</h4>
                    </div>
                </div>
            </a>
        </div>
    {% endfor %}






</div>