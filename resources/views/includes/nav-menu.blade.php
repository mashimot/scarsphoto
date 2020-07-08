<ul class="{{ $isMobile? 'mtree' : 'sf-menu mtheme-left-menu'  }}">
    <li id="menu-item-9710" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-9710">
        <router-link :to="{ name: 'home.index' }">Home</router-link>
    </li>
    <li id="menu-item-9688" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-9688">
        <router-link :to="{ name: 'portfolio.index' }">Portfolio</router-link>
    </li>
    <li id="menu-item-9665" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-9665">
        <router-link :to="{ name: 'about.index' }">About</router-link>
    </li>
    <!--
    <li id="menu-item-9655" class="menu-item menu-item-type-post_type menu-item-object-mtheme_proofing menu-item-has-children menu-item-9655">
        <a href="{ name: 'portfolio.index' }">Blog</a>
    </li>
    -->
    <li id="menu-item-9720" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-9720">
        <router-link :to="{  name: 'contacts.index' }">Contato</router-link>
    </li>
</ul>