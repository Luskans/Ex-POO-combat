<!------------------------->
<!-- HERO CREATION MODAL -->
<!------------------------->

<div class="modal fade" id="creationModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            <div class="modal-header d-flex justify-content-center">
                <h2 class="modal-title" id="staticBackdropLabel">Character creation</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="d-flex flex-column align-items-center justify-content-center gap-3" action="./controllers/index/hero_creation.php" method="post" name="hero_creation">
                    <label for="name">Name :</label>
                    <input type="text" name="name">

                    <p>Class :</p>
                    <div class="d-flex justify-content-center align-items-center flex-wrap">
                        <div class="modal-image d-flex flex-sm-column">
                            <label for="warrior"><img src="./images/classes/swordsman_f.gif"></label>
                            <input type="radio" name="class" value="Warrior">
                        </div>
                        <div class="modal-image d-flex flex-sm-column">
                            <label for="archer"><img src="./images/classes/ranger_m.gif"></label>
                            <input type="radio" name="class" value="Archer">
                        </div>
                        <div class="modal-image d-flex flex-sm-column">
                            <label for="wizard"><img src="./images/classes/wizard_f.gif"></label>
                            <input type="radio" name="class" value="Wizard">
                        </div>
                        <div class="modal-image d-flex flex-sm-column">
                            <label for="priest"><img src="./images/classes/cleric_m.gif"></label>
                            <input type="radio" name="class" value="Priest">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button class="customButton" type="submit" form="hero_creation">Create</button>
            </div>
        </div>
    </div>
</div>

<!------------------------------------>
<!-- HERO CONFIRMATION DELETE MODAL -->
<!------------------------------------>

<div class="modal fade" id="deleteModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center">
                <p>Do you really want to delete this character ?
                <div class="d-flex justify-content-center gap-5">
                    <button type="button" class="customButton" data-bs-dismiss="modal">Cancel</button>
                    <form action="./controllers/index/hero_delete.php" method="get">
                        <input type="hidden" name="heroId" value="<?= $hero->getId() ?>"> 
                        <button class="customButton" type="submit">Confirm</button>    
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
