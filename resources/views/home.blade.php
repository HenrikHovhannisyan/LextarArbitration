@extends('layouts.app')

@section('title')
    Home
@endsection

@section('content')

    <main>
        <section class="hero-section">
            <div class="container">
                <div class="hero-content">
                    <div class="text-part">
                        <h1 class="main-title">
                            Your Premier Arbitration Solution in Toronto, Canada!
                        </h1>
                        <p class="paragraph">
                            At Lextar Arbitration, we redefine the landscape of commercial arbitration.
                            Seamlessly blending innovation with tradition, we bring you a new era of dispute resolution in the heart of Toronto, Canada.
                        </p>
                        <div class="buttons-part">
                            <a href="file-case.html"><button class="secondary arrow">File Online</button></a>
                            <a href="about-us.html"><button class="white">About us</button></a>
                        </div>
                    </div>
                    <div class="image-part">
                        <img src="images/hero-section-image.png" alt="hero section main image">
                    </div>
                </div>

            </div>
        </section>

        <section class="practice-areas">
            <div class="container">
                <div class="section-title">
                    <h1 class="secondary-title centered">Our Practice Areas</h1>
                    <p class="paragraph centered">Explore our practice areas and discover how we can guide you towards swift and equitable resolutions.</p>
                </div>
                <div class="areas-list">
                    <div class="area-item">
                        <img class="item-image" src="images/Contract Disputes.png" alt="Contract Disputes">
                        <div class="item-description">
                            <h4>Contract Disputes</h4>
                            <p class="paragraph">Untangle the complexities of contract disputes with our seasoned arbitrators. We provide nuanced insights and resolutions that uphold contractual obligations, fostering a fair business environment for all parties involved.</p>
                        </div>
                    </div>
                    <div class="area-item">
                        <img class="item-image" src="images/Intellectual Property Disputes.png" alt="Intellectual Property Disputes">
                        <div class="item-description">
                            <h4>Intellectual Property Disputes</h4>
                            <p class="paragraph">Safeguard your creative assets with our arbitration services. From patents and trademarks to copyrights and trade secrets, our team is adept at resolving disputes in the realm of intellectual property, ensuring your innovations remain protected.</p>
                        </div>
                    </div>
                    <div class="area-item">
                        <img class="item-image" src="images/Employment Disputes.png" alt="Employment Disputes">
                        <div class="item-description">
                            <h4>Employment Disputes</h4>
                            <p class="paragraph">Address employment-related conflicts efficiently. Our arbitrators, well-versed in employment law, provide fair resolutions for disputes ranging from wrongful termination to contractual disagreements, fostering a harmonious workplace.</p>
                        </div>
                    </div>
                    <div class="area-item">
                        <img class="item-image" src="images/International Business Disputes.png" alt="International Business Disputes">
                        <div class="item-description">
                            <h4>International Business Disputes</h4>
                            <p class="paragraph">Toronto's status as a global business hub demands arbitration services that transcend borders. Our expertise in handling cross-border disputes ensures a comprehensive and global perspective in the resolution process, aligning with the dynamic nature of international business.</p>
                        </div>
                    </div>
                </div>
                <div class="buttons-part">
                    <a href="practice-areas.html"><button class="secondary arrow">Learn More</button></a>
                    <a href="rules-forms.html"><button class="white">Rules & Forms</button></a>
                </div>
            </div>
        </section>

        <section class="about-us">
            <div class="container">
                <div class="section-title">
                    <h1 class="secondary-title centered">About Us</h1>
                    <p class="paragraph centered">Located in the heart of Toronto, we bring a fresh perspective to commercial arbitration. While we may be new,
                        our commitment to delivering efficient, transparent, and impartial arbitration services sets us apart.</p>
                </div>
                <div class="about-us-content">
                    <div class="image-part"><img src="images/about-us-image.png" alt="about us image"></div>
                    <div class="text-part">
                        <h1 class="title">
                            Our Vision
                        </h1>
                        <p class="paragraph">
                            At Lextar Arbitration, we envision a future where businesses navigate disputes seamlessly, with trust and confidence in a process that values integrity and impartiality. We strive to become the leading name in commercial arbitration, setting new standards for excellence in our field.
                        </p>
                        <div class="buttons-part">
                            <a href="about-us.html"><button class="secondary arrow">Learn More</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="file-online">
            <div class="bg-image-part">
                <div class="right-side"><img src="images/file-online-bg.png" alt="file online bg"></div>
            </div>
            <div class="container">
                <div class="text-part">
                    <h1 class="secondary-title">
                        File Online: Effortless Case Management
                    </h1>
                    <p class="paragraph">
                        We understand the importance of a seamless and efficient case management process in commercial arbitration. That's why we've designed our online platform to empower you, ensuring that the entire journey, from case initiation to resolution, is not only accessible but also streamlined for your convenience.                        </p>
                    <div class="buttons-part">
                        <a href="file-case.html"><button class="secondary arrow">File Online</button></a>
                    </div>
                </div>
            </div>
        </section>

        <section class="faq">
            <div class="container">
                <div class="section-title">
                    <h1 class="secondary-title centered">Frequently Asked Questions</h1>
                    <p class="paragraph centered">If you can't find what you're looking for, feel free to reach out to our dedicated <a href="">support team.</a></p>
                </div>
                <div class="faq-content">
                    <div class="text-part">
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        What is arbitration?
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Arbitration is a private method of resolving disputes that does not involve litigation in court, but rather involves a neutral third party making a ruling.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Is the arbitration award legally binding?
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Arbitration is a private method of resolving disputes that does not involve litigation in court, but rather involves a neutral third party making a ruling.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        Is arbitration enforceable?
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Arbitration is a private method of resolving disputes that does not involve litigation in court, but rather involves a neutral third party making a ruling.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingFour">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                        How to apply for arbitration?
                                    </button>
                                </h2>
                                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Arbitration is a private method of resolving disputes that does not involve litigation in court, but rather involves a neutral third party making a ruling.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="buttons-part">
                            <a href="{{route('faq')}}"><button class="secondary arrow">View all</button></a>
                        </div>
                    </div>
                    <div class="image-part">
                        <img src="{{asset('images/faq-image.png')}}" alt="faq main image">
                    </div>
                </div>
            </div>
        </section>
    </main>

@endsection
