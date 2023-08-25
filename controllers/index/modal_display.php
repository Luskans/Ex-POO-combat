<!------------------------->
<!-- HERO CREATION MODAL -->
<!------------------------->

<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title text-center fs-5" id="staticBackdropLabel">Character creation</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="./controllers/index/hero_creation.php" method="post" name="hero_creation">
                    <label for="name">Name :</label>
                    <input type="text" name="name">

                    <p>Classe :</p>
                    <label for="warrior"><img src="./images/classes/swordsman_f.gif"></label>
                    <input type="radio" name="warrior" value="Warrior">

                    <label for="archer"><img src="./images/classes/ranger_m.gif"></label>
                    <input type="radio" name="archer" value="Archer">

                    <label for="wizard"><img src="./images/classes/wizard_f.gif"></label>
                    <input type="radio" name="wizard" value="Wizard">

                    <label for="priest"><img src="./images/classes/cleric_m.gif"></label>
                    <input type="radio" name="priest" value="Priest">
                </form>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button type="submit" form="hero_creation">Create</button>
            </div>
        </div>
    </div>
</div>