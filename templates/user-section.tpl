
<!-- User piece -->
<div class="row">

    <!-- Profile Image -->
    <div class="col-lg-4 col-md-5">
        <img class="profile-user-img img-responsive img-circle center-block" src="{$user.user_img}">
    </div>

    <div class="col-lg-8 col-md-10">
        <!-- Username -->
        <h3 class="profile-username">{$user.username}</h3>
        <hr class="field-divider" style="border-color: #000;">

        <!-- Employment -->
        <div class="col-md-11">
            <strong><i class="fa fa-file"></i> Employment</strong>
            <p class="text-muted user-field-section">{$user.employment}</p>
            <hr class="field-divider">
        </div>

        <!-- Brief description -->
        <div class="col-md-11">
            <strong><i class="fa fa-book"></i> About me</strong>
            <p class="text-muted user-field-section">
                {$user.brief_description}
            </p>
            <hr class="field-divider">
        </div>

        <!-- Country -->
        <div class="col-md-11">
            <strong><i class="fa fa-flag"></i> Country</strong>
            <p class="text-muted user-field-section">{$user.country} </p>
            <hr class="field-divider">
        </div>

        <!-- Link -->
        <div class="col-md-11">
            <strong><i class="fa fa-link"></i> Link</strong> </br>
            <span class="text-muted user-field-section">

            {if isset($user.links)}
                {if isset($user.links[0])}
                    <a class="fa fa-github user-link" href="{$user.links[0]}" target=”_blank”></a>
                {/if}
                {if isset($user.links[1])}
                    <a class="fa fa-dropbox user-link" href="{$user.links[1]}" target=”_blank”></a>
                {/if}
                {if isset($user.links[2])}
                    <a class="fa fa-linkedin user-link" href="{$user.links[2]}" target=”_blank”></a>
                {/if}
                {if isset($user.links[3])}
                    <a class="fa fa-facebook user-link" href="{$user.links[3]}" target=”_blank”></a>
                {/if}
            {else}
                <span class="text-muted user-field-section"> No available links for this user </span>
            {/if}

            </span>
            <hr class="field-divider">
        </div>
    </div>
</div>
