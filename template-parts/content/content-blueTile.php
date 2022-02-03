<div class="tile-blue-wrapper">
    <div class="tile-blue">
        <div class="tile-blue__icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="56.862" height="56.972" viewBox="0 0 56.862 56.972">
                <path id="Icon_feather-phone" data-name="Icon feather-phone" d="M58.025,44.154v8.275a5.517,5.517,0,0,1-6.013,5.517,54.587,54.587,0,0,1-23.8-8.468,53.787,53.787,0,0,1-16.55-16.55A54.587,54.587,0,0,1,3.19,9.013,5.517,5.517,0,0,1,8.679,3h8.275a5.517,5.517,0,0,1,5.517,4.744A35.416,35.416,0,0,0,24.4,15.5a5.517,5.517,0,0,1-1.241,5.82l-3.5,3.5a44.133,44.133,0,0,0,16.55,16.55l3.5-3.5a5.517,5.517,0,0,1,5.82-1.241,35.416,35.416,0,0,0,7.751,1.931A5.517,5.517,0,0,1,58.025,44.154Z" transform="translate(-2.165 -2)" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
            </svg>
        </div>
        <?php
            if(is_active_sidebar('contact-one')){
                dynamic_sidebar('contact-one');
            }
        ?>
    </div>
    <div class="tile-blue">
        <div class="tile-blue__icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="66.896" height="53.312" viewBox="0 0 66.896 53.312">
                <g id="Icon_feather-mail" data-name="Icon feather-mail" transform="translate(-1.747 -5.1)">
                    <path id="Pfad_101" data-name="Pfad 101" d="M9.439,6H60.951a6.458,6.458,0,0,1,6.439,6.439V51.073a6.458,6.458,0,0,1-6.439,6.439H9.439A6.458,6.458,0,0,1,3,51.073V12.439A6.458,6.458,0,0,1,9.439,6Z" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"/>
                    <path id="Pfad_102" data-name="Pfad 102" d="M67.39,9,35.195,31.536,3,9" transform="translate(0 3.439)"  stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"/>
                </g>
            </svg>
        </div>
        <?php
            if(is_active_sidebar('contact-two')){
                dynamic_sidebar('contact-two');
            }
            ?>   
    </div>
</div>