{{-- Main Footer Section --}}
<section class="footer-bg">
<footer class="footer">
            <div class="container">
                <div class="footer-inner">
                    <div class="footer-left">
                        <h2>Let’s<br><span>Connect.</span></h2>
                        <p>The Viduthalai Chiruthaigal Katchi (VCK) is a formidable political force in Tamil Nadu, committed to the complete annihilation of the caste system.</p>

                        <div class="subscribe-box">
                            <input type="email" placeholder="Email address" />
                            <button>Subscribe</button>
                        </div>

                        <div class="social-icons">
                            <p><a href=""><img src="{{ asset('assets/images/images/fb.png') }}" alt="facebook"></a></p>
                            <p><a href=""><img src="{{ asset('assets/images/images/twitter.png') }}" alt="twitter"></a></p>
                            <p><a href=""><img src="{{ asset('assets/images/images/insta.png') }}" alt="instagram"></a></p>
                            <p><a href=""><img src="{{ asset('assets/images/images/yt.png') }}" alt="youtube"></a></p>
                        </div>
                    </div>

                    <div class="footer-right">
                        <div class="footer-column">
                            <div class="footer-column-inner">
                                <h4>{{ __('site.menu.party') }}</h4>
                                <ul>
                                    <li><a href="{{ route('leadership') }}"><span>✔</span> {{ __('site.menu.leadership') }}</a></li>
                                    <li><a href="{{ route('party-wings') }}"><span>✔</span> {{ __('site.color_symbolism.party_wings') }}</a></li>
                                    <li><a href="{{ route('press-releases') }}"><span>✔</span> {{ __('site.menu.press_release') }}</a></li>
                                    <li><a href="{{ route('elected-members') }}"><span>✔</span> {{ __('site.menu.elected_members') }}</a></li>
                                </ul>
                            </div>
                            <div class="footer-column-inner">
                                <h4>{{ __('site.footer.quick_links') }}</h4>
                                <ul>
                                    <li><a href="{{ route('join') }}"><span>✔</span> {{ __('site.menu.join_vck') }}</a></li>
                                    <li><a href="{{ route('donation') }}"><span>✔</span> {{ __('site.menu.donations') }}</a></li>
                                    <li><a href="{{ route('applications') }}"><span>✔</span> {{ __('site.menu.applications') }}</a></li>
                                    <li><a href="{{ route('contact') }}"><span>✔</span> {{ __('site.menu.contact') }}</a></li>
                                </ul>
                            </div>
                        </div>


                        <div class="footer-contact">
                            <div class="contact-item">
                                <div class="icon phone"><img src="{{ asset('assets/images/images/call-icon.png') }}" alt="call"></div>
                                <div>
                                    <h5>Phone</h5>
                                    <p><a href="tel:+91 90920 73388">+91 90920 73388</a></p>
                                </div>
                            </div>
                            <div class="contact-item">
                                <div class="icon mail"><img src="{{ asset('assets/images/images/mail-icon.png') }}" alt="mail"></div>
                                <div>
                                    <h5>Email</h5>
                                    <p><a
                                            href="mailto:info@viduthalaichiruthaigal.com">info@viduthalaichiruthaigalkatchi.com</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
                <div class="footer-bottom">
            <p>Viduthalaichiruthaigal Katchi © Copyright 2025 || All Rights Reserved.</p>
        </div>
    </section>