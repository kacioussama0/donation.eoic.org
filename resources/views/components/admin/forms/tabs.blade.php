<h1>Component</h1>
<div class="card">
    <div class="card-body">

        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="arabic-tab" data-bs-toggle="tab" data-bs-target="#arabic-tab-pane" type="button" role="tab" aria-controls="arabic-tab-pane" aria-selected="true"><span class="fi fi-sa"></span></button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="english-tab" data-bs-toggle="tab" data-bs-target="#english-tab-pane" type="button" role="tab" aria-controls="english-tab-pane" aria-selected="false"><span class="fi fi-us"></span></button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="french-tab-pane" data-bs-toggle="tab" data-bs-target="#french-tab-pane" type="button" role="tab" aria-controls="french-tab-pane" aria-selected="false"><span class="fi fi-fr"></span></button>
            </li>
            <li class="nav-item" role="presentation">
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="arabic-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                @yield('arabic')
            </div>
            <div class="tab-pane fade" id="english-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                @yield('english')
            </div>
            <div class="tab-pane fade" id="french-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
                @yield('french')
            </div>

        </div>


    </div>
</div>
