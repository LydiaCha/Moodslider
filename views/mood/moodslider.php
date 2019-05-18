<h2>Moodslider</h2>
<h3>What are you in the mood for?</h3>

<!-- Mood sliders -->
<div class="range-container">
    <div class="mb-5">
        <div class="row mb-3">
            <div class="col-2 text-right">
                Agitated
            </div>
            <div class=" col-8 slide-container">
                <input type="range" min="0" max="100" value="50" class="slider" id="agitatedCalmSlider" onchange="loadRecommendations()">
            </div>
            <div class="col-2">
                Calm
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-2 text-right">
                Happy
            </div>
            <div class=" col-8 slide-container">
                <input type="range" min="0" max="100" value="50" class="slider" id="happySadSlider" onchange="loadRecommendations()">
            </div>
            <div class="col-2">
                Sad
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-2 text-right">
                Tired
            </div>
            <div class="col-8 slide-container">
                <input type="range" min="0" max="100" value="50" class="slider" id="tiredWideawakeSlider" onchange="loadRecommendations()">
            </div>
            <div class="col-2">
                Wide Awake
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-2 text-right">
                Scared
            </div>
            <div class="col-8 slide-container">
                <input type="range" min="0" max="100" value="50" class="slider" id="scaredFearlessSlider" onchange="loadRecommendations()">
            </div>
            <div class="col-2">
                Fearless
            </div>
        </div>
    </div>
</div>

<div class="container cards-container recommendation-container">
    <div class="row" id="recommendations"></div>
</div>

<script>
    //ajax to load movie recommendations
    function loadRecommendations() {
        //get slider values
        var agitatedCalmSlider = document.getElementById("agitatedCalmSlider").value;
        var happySadSlider = document.getElementById("happySadSlider").value;
        var tiredWideawakeSlider = document.getElementById("tiredWideawakeSlider").value;
        var scaredFearlessSlider = document.getElementById("scaredFearlessSlider").value;
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                document.getElementById("recommendations").innerHTML = this.response;
            }
        };
        //fetch movie recommendations
        xhttp.open("GET", "index.php?controller=mood&action=recommendations&agitatedCalmSlider=" + agitatedCalmSlider + "&happySadSlider=" + happySadSlider + "&tiredWideawakeSlider=" + tiredWideawakeSlider + "&scaredFearlessSlider=" + scaredFearlessSlider, true);
        xhttp.send();
    }
    loadRecommendations();
</script>  
