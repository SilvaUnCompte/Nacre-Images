<link rel="stylesheet" href="/public/styles/pages/workshop-info/workshop-info.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Baloo+2:400,800&display=swap">

<main id="workshop-info">

    <!-- Button panel -->
    <section id="workshop-navbar" class="display-block inline-container">
        <a class="btn btn-primary form-number" href="/dashboard/liste-des-stages">Retour</a>
        <?php
        if ($edition) {
            echo '<button class="btn btn-primary form-number" type="button" onclick="deleteWorkshop(' . $id . ')">Supprimer</button>';
        }
        ?>
        <button id="toogle-button-page" class="btn btn-primary form-number" type="button" onclick="toogleView()">Aperçu</button>
        <?php
        if ($edition) {
            echo '<button class="btn btn-primary form-number" type="button" onclick="updateWorkshop(' . $id . ')">Update</button>';
        } else {
            echo '<button class="btn btn-primary form-number" type="button" onclick="createWorkshop()">Créer</button>';
        }
        ?>
    </section>

    <!-- Evdit view -->
    <section id="page-edition" class="display-block">
        <!-- Infos complémentaires -->
        <div class="inline-container">
            <div class="form-group">
                <label for="workshop-page-name" class="form-label">Nom sur l'onglet de la page</label>
                <input type="text" id="workshop-page-name" class="form-input" value="<?php echo $edition ? $workshop_type->getPageName() : ''; ?>" placeholder="Nom sur l'onglet de la page">
            </div>
            <div class="form-group">
                <label for="workshop-name" class="form-label">Nom dans le calendrier</label>
                <input type="text" id="workshop-name" class="form-input" value="<?php echo $edition ? $workshop_type->getTopicName() : ''; ?>" placeholder="Nom dans le calendrier">
            </div>
            <div class="form-group">
                <label for="workshop-url" class="form-label">URL de la page web (et nom du fichier des images)</label>
                <input type="text" id="workshop-url" class="form-input" value="<?php echo $edition ? $workshop_type->getUrl() : ''; ?>" placeholder="URL de la page web">
            </div>
            <div class="form-group">
                <label for="workshop-regularity" class="form-label">Type de régularité</label>
                <select id="workshop-regularity" class="form-input">
                    <option value="" disabled selected>Choisir un type de régularité</option>
                    <option value="0" <?php echo $edition && $workshop_type->getRegularityType() == 0 ? 'selected' : ''; ?>>Classiques</option>
                    <option value="1" <?php echo $edition && $workshop_type->getRegularityType() == 1 ? 'selected' : ''; ?>>Exceptionnels</option>
                    <option value="2" <?php echo $edition && $workshop_type->getRegularityType() == 2 ? 'selected' : ''; ?>>Sur demande</option>
                    <option value="3" <?php echo $edition && $workshop_type->getRegularityType() == 3 ? 'selected' : ''; ?>>Séjour photo</option>
                </select>
            </div>
        </div>
        <br>

        <div class="inline-container">
            <!-- Images -->
            <div>
                <div class="form-group">
                    <label for="workshop-image-name" class="form-label">Nom de référence de l'image</label>
                    <input type="text" id="workshop-image-name" class="form-input" value="<?php echo $edition ? $workshop_type->getImgName() : ''; ?>" placeholder="potato.jpg">
                </div>
                <div class="form-group">
                    <label for="workshop-image-calendar" class="form-label">Image du calendrier</label>
                    <input type="text" id="workshop-image-calendar" class="form-input" value="<?php echo $edition ? $workshop_type->getImgCalendar() : ''; ?>" placeholder="potato2.jpg">
                </div>
                <div class="form-group">
                    <label for="workshop-image-alt" class="form-label">Alt des images</label>
                    <input type="text" id="workshop-image-alt" class="form-input" value="<?php echo $edition ? $workshop_type->getImgAlt() : ''; ?>" placeholder="une patate">
                </div>
                <h4>Code pour la descrition :</h4>
                <div class="inline-container">
                    <p class="left-text">
                        **Text**<br>
                        *Text*<br>
                        __Text__<br>
                        {1*}<br>
                        {1_}<br>
                        {1+}<br>
                    </p>
                    <p>
                        => <br>
                        => <br>
                        => <br>
                        => <br>
                        => <br>
                        => <br>
                    </p>
                    <p class="right-text">
                        <span style="font-weight: bold;">Text</span><br>
                        <span style="font-style: italic;">Text</span><br>
                        <span style="text-decoration: underline;">Text</span><br>
                        Prix €<br>
                        Label<br>
                        Type<br>
                    </p>
                </div>
            </div>
            <!-- Text -->
            <div>
                <div class="inline-container">
                    <div class="form-group">
                        <label for="workshop-big-title" class="form-label">Grand titre</label>
                        <input type="text" id="workshop-big-title" class="form-input" value="<?php echo $edition ? $workshop_type->getBigTitle() : ''; ?>" placeholder="Titre du stage">
                    </div>
                    <div class="form-group">
                        <label for="workshop-small-title" class="form-label">Sous titre</label>
                        <input type="text" id="workshop-small-title" class="form-input" value="<?php echo $edition ? $workshop_type->getSmallTitle() : ''; ?>" placeholder="Sous titre du stage">
                    </div>
                </div>
                <div class="form-group">
                    <label for="workshop-paragraph" class="form-label">Description</label>
                    <textarea type="text" id="workshop-paragraph" class="form-textarea" placeholder="La longue description du stage"><?php echo $edition ? $workshop_type->getParagraph() : ''; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="workshop-seo-desc" class="form-label">Description SEO</label>
                    <input type="text" id="workshop-seo-desc" class="form-input" value="<?php echo $edition ? $workshop_type->getSeoDesc() : ''; ?>" placeholder="Description SEO">
                </div>
            </div>
        </div>
    </section>

    <!-- Résultat overview -->
    <section id="page-overview" class="main-section hide">

    </section>
</main>

<script src="/public/js/popup.js" type="text/javascript"></script>
<script src="/public/js/dashboard/workshop.js"></script>
<link rel="stylesheet" href="/public/styles/popup/popup.css">
<link rel="stylesheet" href="/public/styles/pages/topics/topics.css">