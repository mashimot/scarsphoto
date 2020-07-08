<template>
    <footer>
        <div id="goto-top" title="top of page"><i class="fa fa-chevron-up"></i></div>
        <div class="footer-container-wrap clearfix">
            <div class="footer-container clearfix">
                <div id="footer" class="sidebar widgetized clearfix">
                    <div class="footer-column">
                        <div class="sidebar-widget">
                            <aside id="mtheme_image_widget-1" class="widget widget_mtheme_image_widget">
                                <img class="footer-mtheme-image" width="260" src="https://imaginem.io/kinetika/wp-content/themes/kinetika/images/logo_dark.png" alt="logo">        
                            </aside>
                        </div>
                        <div class="sidebar-widget">
                            <aside id="contact_details-1" class="widget mtheme_contact_widget">
                                <ul class="contact_address_block">
                                    <li class="about_info">
                                        {{ about.info }}
                                    </li>
                                    <li><span class="contact_name">{{ contact.contact_name }}</span></li>
                                    <li><span class="contact_address">{{ contact.contact_address }}</span></li>
                                    <li>
                                        <span class="contact_city">{{ contact.contact_city }}</span>
                                        <span class="contact_zip">{{ contact.contact_zip }}</span>			
                                    </li>
                                    <li>
                                        <span class="contact_mobile">
                                            <a :href="`tel:${contact.contact_mobile}`">{{ contact.contact_mobile }}</a>
                                        </span>
                                    </li>
                                    <li>
                                        <span class="contact_email">
                                            <a :href="contact.contact_email">{{ contact.contact_email }}</a>
                                        </span>
                                    </li>
                                </ul>
                            </aside>
                        </div>
                        <div class="sidebar-widget">
                            <aside id="msocial-widget-2" class="widget MSocial_Widget">
                                <div class="social-header-wrap">
                                    <social-media-list></social-media-list>
                                </div>
                            </aside>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</template>

<script>
    export default {
        data() {
            return {
                about: {
                    info: 'Curabitur massa. Donec eleifend, libero at sagittis mollis, tellus est malesuada tellus, at luctus turpis elit sit amet quam. Vivamus pretium ornare est.'
                },
                contact: {
                    contact_name: 'Company Co.', 
                    contact_address: 'Avenida do Café',
                    contact_city: 'São Paulo',
                    contact_zip: '04311-000',
                    contact_phone: '(11) 97271-0330',
                    contact_mobile: '(11) 97271-0330',
                    contact_email: 'fabiohashimoto@gmail.com'
                }
                
            }
        }

    }
</script>