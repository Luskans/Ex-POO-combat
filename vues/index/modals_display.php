<!------------------------->
<!-- HERO CREATION MODAL -->
<!------------------------->

<div class="modal fade" id="creationModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            <div class="modal-header d-flex justify-content-center">
                <h2 class="modal-title" id="staticBackdropLabel">Character creation</h2>
                <button type="button" class="btn-close cancelAudio" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="d-flex flex-column align-items-center justify-content-center gap-3" action="./controllers/index/hero_creation.php" method="post" id="hero_creation">
                    <label for="name">Name :</label>
                    <input type="text" name="name" required>

                    <p>Class :</p>
                    <div class="d-flex justify-content-center align-items-center flex-wrap">
                        <div class="modal-image d-flex flex-sm-column">
                            <label for="warrior"><img src="./utilities/images/classes/doppelsoeldner_m.gif"></label>
                            <input type="radio" name="class" value="Warrior" required>
                        </div>
                        <div class="modal-image d-flex flex-sm-column">
                            <label for="archer"><img src="./utilities/images/classes/ranger_m.gif"></label>
                            <input type="radio" name="class" value="Archer">
                        </div>
                        <div class="modal-image d-flex flex-sm-column">
                            <label for="wizard"><img src="./utilities/images/classes/sage_m.gif"></label>
                            <input type="radio" name="class" value="Wizard">
                        </div>
                        <div class="modal-image d-flex flex-sm-column">
                            <label for="priest"><img src="./utilities/images/classes/monk_m.gif"></label>
                            <input type="radio" name="class" value="Priest">
                        </div>
                        <div class="modal-image d-flex flex-sm-column">
                            <label for="monk"><img src="./utilities/images/classes/nakmuay_m.gif"></label>
                            <input type="radio" name="class" value="Monk">
                        </div>
                        <div class="modal-image d-flex flex-sm-column">
                            <label for="duellist"><img src="./utilities/images/classes/fencer_m.gif"></label>
                            <input type="radio" name="class" value="Duellist">
                        </div>
                        <div class="modal-image d-flex flex-sm-column">
                            <label for="paladin"><img src="./utilities/images/classes/hoplite_m.gif"></label>
                            <input type="radio" name="class" value="Paladin">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button class="customButton confirmAudio" type="submit" form="hero_creation">Create</button>
            </div>
        </div>
    </div>
</div>