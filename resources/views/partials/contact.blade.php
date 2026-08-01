<section id="contact">
    <div class="container">
        <div class="section-eyebrow mb-2">Contact</div>
        <h2 class="section-title mb-5">Give me a shot?</h2>
        <div class="row g-4">
            <div class="col-lg-7">
                @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <form action="{{ route('contact.send') }}" method="POST" class="contact-form">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="name" class="form-label small text-secondary mono">Name</label>
                            <input
                                type="text"
                                class="form-control"
                                id="name"
                                name="name"
                                value="{{ old('name') }}"
                                placeholder="Your Name"
                                required
                            />
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label small text-secondary mono">Email</label>
                            <input
                                type="email"
                                class="form-control"
                                id="email"
                                name="email"
                                value="{{ old('email') }}"
                                placeholder="boringotrudy8@gmail.com"
                                required
                            />
                        </div>
                        <div class="col-12">
                            <label for="subject" class="form-label small text-secondary mono">Subject</label>
                            <input
                                type="text"
                                class="form-control"
                                id="subject"
                                name="subject"
                                value="{{ old('subject') }}"
                                placeholder="Project Inquiry"
                                required
                            />
                        </div>
                        <div class="col-12">
                            <label for="message" class="form-label small text-secondary mono">Message</label>
                            <textarea
                                class="form-control"
                                id="message"
                                name="message"
                                rows="5"
                                placeholder="Tell me about your project..."
                                required
                            >
{{ old('message') }}</textarea
                            >
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-send">
                                <i class="bi bi-send me-2"></i>Send Message
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-5">
                <div class="contact-info-card">
                    <div class="contact-info-item">
                        <i class="bi bi-envelope"></i>
                        <div>
                            <div class="text-secondary small mono">Email</div>
                            <div>boringotrudy8@gmail.com</div>
                        </div>
                    </div>
                    <div class="contact-info-item">
                        <i class="bi bi-geo-alt"></i>
                        <div>
                            <div class="text-secondary small mono">Location</div>
                            <div>Buhi, Camarines Sur, Philippines</div>
                        </div>
                    </div>
                    <div class="contact-info-item">
                        <i class="bi bi-telephone"></i>
                        <div>
                            <div class="text-secondary small mono">Phone</div>
                            <div>+63 9951050535</div>
                        </div>
                    </div>
                    <hr style="border-color: var(--border)" />
                    <div class="text-secondary small mono mb-3">Find me on</div>
                    <div class="d-flex gap-3">
                        <a
                            href="https://github.com/rudy-coderr"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="social-icon"
                            aria-label="GitHub"
                            ><i class="bi bi-github"></i
                        ></a>
                        <a
                            href="https://www.facebook.com/rudy.boringot.9/"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="social-icon"
                            aria-label="Facebook"
                            ><i class="bi bi-facebook"></i
                        ></a>
                        <a
                            href="https://www.instagram.com/_imrudeee/"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="social-icon"
                            aria-label="Instagram"
                            ><i class="bi bi-instagram"></i
                        ></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
