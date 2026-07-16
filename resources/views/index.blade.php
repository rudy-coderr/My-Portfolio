<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Rudy Boringot — Aspiring Web Developer</title>

<!-- Bootstrap 5 CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
<!-- Google Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500;600;700&family=Inter:wght@400;500;600&family=JetBrains+Mono:wght@400;500;600&display=swap" rel="stylesheet">

<style>
  :root{
    --bg:            #0A0E14;
    --surface:       #12161F;
    --surface-alt:   #1A2030;
    --border:        #232A3B;
    --text:          #E6E9EF;
    --text-muted:    #8B93A7;
    --accent:        #4C8DFF;
    --accent-deep:   #2563EB;
    --accent-glow:   #7AB8FF;
    --accent-soft:   rgba(76,141,255,0.12);

    --font-display: 'Space Grotesk', sans-serif;
    --font-body:    'Inter', sans-serif;
    --font-mono:    'JetBrains Mono', monospace;

    --radius-lg: 18px;
    --radius-md: 12px;
    --radius-sm: 8px;
  }

  *{ scroll-behavior: smooth; }

  body{
    background-color: var(--bg);
    color: var(--text);
    font-family: var(--font-body);
    line-height: 1.65;
    background-image:
      radial-gradient(circle at 15% 0%, rgba(76,141,255,0.08) 0%, transparent 40%),
      radial-gradient(circle at 85% 20%, rgba(76,141,255,0.05) 0%, transparent 35%);
    background-attachment: fixed;
  }

  h1,h2,h3,h4,.display-font{ font-family: var(--font-display); letter-spacing: -0.01em; }
  .mono{ font-family: var(--font-mono); }

  ::selection{ background: var(--accent); color: #05070C; }

  a:focus-visible, button:focus-visible, input:focus-visible, textarea:focus-visible{
    outline: 2px solid var(--accent-glow);
    outline-offset: 3px;
  }

  .section-eyebrow{
    font-family: var(--font-mono);
    color: var(--accent);
    font-size: 0.85rem;
    letter-spacing: 0.02em;
  }
  .section-eyebrow::before{ content: "// "; color: var(--text-muted); }

  .section-title{
    font-size: clamp(1.9rem, 3vw, 2.6rem);
    font-weight: 600;
    margin-bottom: 1rem;
  }

  section{ padding: 6.5rem 0; border-top: 1px solid var(--border); }
  #hero{ border-top: none; }

  /* ==================== ENHANCED BUTTON STYLES ==================== */
  .btn-primary-custom{
    background: linear-gradient(135deg, var(--accent), var(--accent-deep));
    border: none;
    color: #05070C;
    font-weight: 600;
    border-radius: var(--radius-sm);
    padding: 0.85rem 1.9rem;
    font-size: 1.02rem;
    transition: all 0.3s ease;
    box-shadow: 0 4px 20px rgba(76,141,255,0.35);
    text-decoration: none;
  }
  .btn-primary-custom:hover{
    background: linear-gradient(135deg, var(--accent-glow), var(--accent));
    transform: translateY(-4px);
    box-shadow: 0 10px 30px rgba(76,141,255,0.5);
    color: #05070C;
  }

  .btn-outline-custom{
    background: transparent;
    border: 2px solid var(--border);
    color: var(--text);
    border-radius: var(--radius-sm);
    padding: 0.85rem 1.9rem;
    font-size: 1.02rem;
    font-weight: 500;
    transition: all 0.3s ease;
    text-decoration: none;
  }
  .btn-outline-custom:hover{
    border-color: var(--accent);
    color: var(--accent);
    background: var(--accent-soft);
    transform: translateY(-4px);
  }

  .btn-send{
    background: linear-gradient(135deg, var(--accent), var(--accent-deep));
    border: none;
    color: #05070C;
    font-weight: 600;
    border-radius: var(--radius-sm);
    padding: 0.9rem 2rem;
    font-size: 1.05rem;
    transition: all 0.3s ease;
    box-shadow: 0 4px 20px rgba(76,141,255,0.35);
    width: 100%;
  }
  .btn-send:hover{
    background: linear-gradient(135deg, var(--accent-glow), var(--accent));
    transform: translateY(-4px);
    box-shadow: 0 10px 30px rgba(76,141,255,0.5);
    color: #05070C;
  }

  .navbar-custom{
    position: sticky; top: 0; z-index: 1000;
    background: rgba(10,14,20,0.85);
    backdrop-filter: blur(12px);
    border-bottom: 1px solid var(--border);
  }
  .navbar-brand-custom{
    font-family: var(--font-mono);
    font-weight: 600;
    font-size: 1.15rem;
    color: var(--text) !important;
  }
  .navbar-brand-custom .bracket{ color: var(--accent); }

  .nav-link-custom{
    font-family: var(--font-mono);
    font-size: 0.92rem;
    color: var(--text-muted) !important;
    margin: 0 0.65rem;
    position: relative;
    transition: color 0.2s ease;
  }
  .nav-link-custom:hover{ color: var(--text) !important; }
  .nav-link-custom::after{
    content: "";
    position: absolute; left: 0; bottom: -4px;
    width: 0; height: 2px;
    background: var(--accent);
    transition: width 0.25s ease;
  }
  .nav-link-custom:hover::after{ width: 100%; }

  .btn-resume{
    font-family: var(--font-mono);
    font-size: 0.88rem;
    color: var(--bg);
    background: var(--accent);
    border-radius: var(--radius-sm);
    padding: 0.5rem 1.1rem;
    transition: all 0.2s ease;
  }
  .btn-resume:hover{ 
    background: var(--accent-glow); 
    color: var(--bg); 
    box-shadow: 0 0 22px rgba(76,141,255,0.45); 
  }
  .btn-resume{
  font-family: var(--font-mono);
  font-size: 0.88rem;
  color: var(--bg);
  background: var(--accent);
  border-radius: var(--radius-sm);
  padding: 0.5rem 1.1rem;
  transition: all 0.2s ease;
  display: inline-flex;
  align-items: center;
}
.btn-resume:hover{ background: var(--accent-glow); color: var(--bg); box-shadow: 0 0 22px rgba(76,141,255,0.45); }
.btn-resume::after{ display: none; } /* tanggalin default caret, gagamit tayo ng bootstrap icon na lang o custom */

.dropdown-menu{
  background: var(--surface);
  border: 1px solid var(--border);
  border-radius: var(--radius-md);
  padding: 0.5rem;
  margin-top: 0.5rem !important;
  box-shadow: 0 20px 40px -15px rgba(0,0,0,0.6);
}
.dropdown-item{
  font-family: var(--font-mono);
  font-size: 0.88rem;
  color: var(--text);
  border-radius: var(--radius-sm);
  padding: 0.65rem 0.9rem;
  transition: all 0.2s ease;
}
.dropdown-item:hover, .dropdown-item:focus{
  background: var(--accent-soft);
  color: var(--accent);
}

  .hero-name{
    font-size: clamp(2.4rem, 5vw, 4rem);
    font-weight: 700;
    line-height: 1.05;
    margin: 0.75rem 0 0.5rem;
  }
  .hero-name .accent-text{
    background: linear-gradient(90deg, var(--accent), var(--accent-glow));
    -webkit-background-clip: text; background-clip: text; color: transparent;
  }

  .hero-role{ font-size: 1.25rem; color: var(--text-muted); margin-bottom: 1.5rem; }

  .code-window{
    background: var(--surface);
    border: 1px solid var(--border);
    border-radius: var(--radius-lg);
    overflow: hidden;
    box-shadow: 0 30px 60px -20px rgba(0,0,0,0.6);
  }
  .code-window-header{
    display:flex; align-items:center; gap:8px;
    padding: 0.85rem 1rem;
    background: var(--surface-alt);
    border-bottom: 1px solid var(--border);
  }
  .code-dot{ width:11px; height:11px; border-radius:50%; }
  .code-dot.red{ background:#FF5F57; } 
  .code-dot.yellow{ background:#FEBC2E; } 
  .code-dot.green{ background:#28C840; }
  .code-filename{ font-family: var(--font-mono); font-size: 0.8rem; color: var(--text-muted); margin-left: 0.5rem; }

  .code-body{
    font-family: var(--font-mono);
    font-size: 0.92rem;
    padding: 1.5rem;
    color: #B4BCCC;
    line-height: 1.9;
    min-height: 260px;
  }
  .code-body .ln{ color: #4A5064; width: 1.6rem; display:inline-block; user-select:none; }
  .tok-kw{ color: #7AB8FF; }
  .tok-str{ color: #9EE6B8; }
  .tok-fn{ color: #C9A6FF; }
  .tok-com{ color: #5A6479; }
  .code-cursor{
    display:inline-block; width:8px; height:1.05rem; background: var(--accent);
    vertical-align: text-bottom; animation: blink 1s step-end infinite;
  }
  @keyframes blink{ 50%{ opacity:0; } }

  .about-photo-frame{
  border-radius: var(--radius-lg);
  border: 1px solid var(--border);
  padding: 10px;
  background: var(--surface);
}
.about-photo-frame img{ 
  border-radius: calc(var(--radius-lg) - 6px); 
  width:100%; 
  display:block; 
  max-height: 580px; 
  object-fit: cover; 
}
  .stat-block{ border-left: 2px solid var(--accent); padding-left: 1rem; }
 .stat-number{ 
  font-family: var(--font-mono); 
  font-size: 2rem; 
  font-weight: 700; 
  color: var(--text); 
}
  .stat-label{ font-family: var(--font-mono); font-size: 0.8rem; color: var(--text-muted); }

  .skill-group-title{
    font-family: var(--font-mono);
    font-size: 0.85rem;
    color: var(--text-muted);
    text-transform: uppercase;
    letter-spacing: 0.08em;
    margin-bottom: 1rem;
  }
  .skill-chip{
    display:inline-flex; align-items:center; gap:0.5rem;
    font-family: var(--font-mono); font-size: 0.88rem;
    background: var(--surface);
    border: 1px solid var(--border);
    border-radius: 999px;
    padding: 0.5rem 1rem;
    margin: 0 0.5rem 0.6rem 0;
    transition: all 0.2s ease;
  }
  .skill-chip:hover{
    border-color: var(--accent);
    background: var(--accent-soft);
    transform: translateY(-2px);
  }

  .project-card{
    background: var(--surface);
    border: 1px solid var(--border);
    border-radius: var(--radius-lg);
    overflow: hidden;
    height: 100%;
    transition: transform 0.25s ease, border-color 0.25s ease, box-shadow 0.25s ease;
  }
  .project-card:hover{
    transform: translateY(-6px);
    border-color: var(--accent);
    box-shadow: 0 20px 40px -18px rgba(76,141,255,0.35);
  }
  .project-img-wrap img{ width:100%; display:block; transition: transform 0.4s ease; }
  .project-card:hover .project-img-wrap img{ transform: scale(1.06); }

  .project-tag{
    font-family: var(--font-mono);
    font-size: 0.72rem;
    color: var(--accent);
    background: var(--accent-soft);
    border-radius: 999px;
    padding: 0.2rem 0.6rem;
    margin: 0 0.35rem 0.35rem 0;
    display:inline-block;
  }

  .contact-form .form-control{
    background: var(--surface);
    border: 1px solid var(--border);
    color: var(--text);
    border-radius: var(--radius-md);
    padding: 0.85rem 1rem;
  }
  .contact-form .form-control:focus{
    border-color: var(--accent);
    box-shadow: 0 0 0 4px var(--accent-soft);
  }

  .contact-info-card{
    background: var(--surface);
    border: 1px solid var(--border);
    border-radius: var(--radius-lg);
    padding: 2rem;
    height: 100%;
  }
  .social-icon{
    width: 42px; height: 42px;
    display:flex; align-items:center; justify-content:center;
    border: 1px solid var(--border); border-radius: 50%;
    color: var(--text-muted);
    transition: all 0.2s ease;
  }
  .social-icon:hover{ color: var(--bg); background: var(--accent); border-color: var(--accent); }

  footer{
    border-top: 1px solid var(--border);
    padding: 2.5rem 0;
    font-family: var(--font-mono);
    font-size: 0.85rem;
    color: var(--text-muted);
  }

  .back-to-top{
    width: 42px; height: 42px;
    border-radius: 50%;
    background: var(--surface);
    border: 1px solid var(--border);
    color: var(--accent);
    display:flex; align-items:center; justify-content:center;
    transition: all 0.2s ease;
  }
  .back-to-top:hover{ background: var(--accent); color: var(--bg); }
</style>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-custom py-3">
  <div class="container">
    <a class="navbar-brand navbar-brand-custom" href="#hero"><span class="bracket">&lt;</span>Rudy<span class="bracket">/&gt;</span></a>
    <button class="navbar-toggler border-0 text-white" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
      <i class="bi bi-list fs-2 text-white"></i>
    </button>
   <div class="collapse navbar-collapse justify-content-end" id="mainNav">
    <ul class="navbar-nav align-items-lg-center gap-lg-2">
        <li class="nav-item">
            <a class="nav-link nav-link-custom" href="#about">About</a>
        </li>

        <li class="nav-item">
            <a class="nav-link nav-link-custom" href="#skills">Skills</a>
        </li>

        <li class="nav-item">
            <a class="nav-link nav-link-custom" href="#projects">Projects</a>
        </li>

        <li class="nav-item">
            <a class="nav-link nav-link-custom" href="#contact">Contact</a>
        </li>

        <li class="nav-item dropdown mt-3 mt-lg-0 ms-lg-3">
            <a class="btn btn-resume dropdown-toggle"
               href="#"
               role="button"
               data-bs-toggle="dropdown"
               aria-expanded="false">
                <i class="bi bi-download me-1"></i> Resume
            </a>

            <ul class="dropdown-menu dropdown-menu-end">
                <li>
                    <a class="dropdown-item"
                       href="{{ asset('files/Rudy_Resume.pdf') }}"
                       download>
                        <i class="bi bi-file-earmark-pdf-fill text-danger me-2"></i>
                        PDF
                    </a>
                </li>

                <li>
                    <a class="dropdown-item"
                       href="{{ asset('images/Resume.png') }}"
                       download>
                        <i class="bi bi-image-fill text-primary me-2"></i>
                        Image
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</div>
  </div>
</nav>

<!-- HERO -->
<section id="hero">
  <div class="container">
    <div class="row align-items-center gy-5">
      <div class="col-lg-6">
        <div class="hero-kicker"><span class="dot"></span>Open to Junior Web Developer roles</div>
        <h1 class="hero-name">Hi, I'm <span class="accent-text">Rudy Boringot</span></h1>
        <p class="hero-role">Fresh Information Technology Grad &amp; Aspiring Web Developer</p>
        <p class="text-secondary mb-4" style="max-width: 520px;">
          I just graduated and I'm excited to start my journey as a web developer. 
          I'm comfortable with basic frontend and backend development using Laravel &amp; CodeIgniter, 
          along with WordPress, basic React, and React Native.
        </p>
        <div class="d-flex flex-wrap gap-3">
          <a href="#projects" class="btn btn-primary-custom">See My Projects</a>
          <a href="#contact" class="btn btn-outline-custom">Let's Talk</a>
        </div>
      </div>

      <div class="col-lg-6">
        <div class="code-window">
          <div class="code-window-header">
            <span class="code-dot red"></span><span class="code-dot yellow"></span><span class="code-dot green"></span>
            <span class="code-filename">about-me.js</span>
          </div>
          <div class="code-body">
<span class="ln">1</span><span class="tok-kw">const</span> <span class="tok-fn">newGrad</span> = {<br>
<span class="ln">2</span>&nbsp;&nbsp;name: <span class="tok-str">'Rudy Boringot'</span>,<br>
<span class="ln">3</span>&nbsp;&nbsp;status: <span class="tok-str">'Fresh Graduate, BS IT'</span>,<br>
<span class="ln">4</span>&nbsp;&nbsp;based_in: <span class="tok-str">'Manila, PH'</span>,<br>
<span class="ln">5</span>&nbsp;&nbsp;role: <span class="tok-str">'Aspiring Web Developer'</span>,<br>
<span class="ln">6</span>&nbsp;&nbsp;stack: [<span class="tok-str">'Laravel'</span>, <span class="tok-str">'CodeIgniter'</span>, <span class="tok-str">'WordPress'</span>, <span class="tok-str">'React Native'</span>],<br>
<span class="ln">7</span>&nbsp;&nbsp;<span class="tok-com">// learning every day</span><br>
<span class="ln">8</span>&nbsp;&nbsp;experience: <span class="tok-str">'personal projects &amp; internships'</span>,<br>
<span class="ln">9</span>&nbsp;&nbsp;<span class="tok-fn">hireable</span>: <span class="tok-kw">true</span><br>
<span class="ln">10</span>};<span class="code-cursor"></span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ABOUT -->
<section id="about">
  <div class="container">
    <div class="section-eyebrow mb-2">About</div>
    <h2 class="section-title mb-5">A bit about me</h2>

    <div class="row align-items-center gy-5">
  <div class="col-lg-5">
    <div class="about-photo-frame">
      <img src="{{ asset('images/profile.jpg') }}" alt="Rudy Boringot" class="img-fluid rounded">
    </div>
  </div>  <!-- 👈 this was missing -->
  <div class="col-lg-7">
    <p class="text-secondary mb-4">
      I just finished my Information Technology degree and I'm looking for my first role as a Junior Web Developer. 
      I'm comfortable building websites using Laravel and CodeIgniter for the backend, WordPress for quick solutions, 
      and have experience with basic React and React Native.
    </p>
    <p class="text-secondary mb-4">
      I enjoy turning ideas into functional web applications. Most of what I know comes from hands-on projects, 
      tutorials, and lots of debugging. I'm a quick learner, reliable, and genuinely excited to grow in a real team.
    </p>

    <div class="row g-4">
      <div class="col-6 col-md-4">
        <div class="stat-block">
          <div class="stat-number">Fresh</div>
          <div class="stat-label">out of college</div>
        </div>
      </div>
      <div class="col-6 col-md-4">
        <div class="stat-block">
          <div class="stat-number">2</div>
          <div class="stat-label">internships done</div>
        </div>
      </div>
      <div class="col-6 col-md-4">
        <div class="stat-block">
          <div class="stat-number">10+</div>
          <div class="stat-label">personal projects</div>
        </div>
      </div>
    </div>
  </div>
</div>

</section>

<!-- SKILLS -->
<section id="skills">
  <div class="container">
    <div class="section-eyebrow mb-2">Skills</div>
    <h2 class="section-title mb-5">Stuff I've been learning</h2>

    <div class="row gy-4">
      <div class="col-md-4">
        <div class="skill-group-title">Languages</div>
        <div>
          <span class="skill-chip"><i class="bi bi-filetype-js"></i>JavaScript</span>
          <span class="skill-chip"><i class="bi bi-filetype-html"></i>HTML5</span>
          <span class="skill-chip"><i class="bi bi-filetype-css"></i>CSS3</span>
          <span class="skill-chip"><i class="bi bi-filetype-php"></i>PHP</span>
        </div>
      </div>
      <div class="col-md-4">
        <div class="skill-group-title">Frameworks &amp; CMS</div>
        <div>
          <span class="skill-chip"><i class="bi bi-braces-asterisk"></i>Laravel</span>
          <span class="skill-chip"><i class="bi bi-code-slash"></i>CodeIgniter</span>
          <span class="skill-chip"><i class="bi bi-bootstrap"></i>React</span>
          <span class="skill-chip"><i class="bi bi-wordpress"></i>WordPress</span>
        </div>
      </div>
      <div class="col-md-4">
        <div class="skill-group-title">Tools &amp; Others</div>
        <div>
          <span class="skill-chip"><i class="bi bi-git"></i>Git</span>
          <span class="skill-chip"><i class="bi bi-phone"></i>React Native</span>
          <span class="skill-chip"><i class="bi bi-github"></i>GitHub</span>
          <span class="skill-chip"><i class="bi bi-window"></i>NetBeans</span>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- PROJECTS -->
<section id="projects">
  <div class="container">
    <div class="section-eyebrow mb-2">Projects</div>
    <h2 class="section-title mb-5">Things I've built</h2>

    <div class="row g-4">
      <div class="col-md-6 col-lg-4">
        <div class="project-card">
          <div class="project-img-wrap">
            <img src="https://placehold.co/600x400/12161F/4C8DFF?text=Capstone+Project" alt="Capstone Project">
          </div>
          <div class="p-4">
            <h5 class="mb-2">StudyBuddy — Thesis Project</h5>
            <p class="text-secondary small mb-3">My college capstone: a study-group finder web app. Built with Laravel and MySQL.</p>
            <div class="mb-3">
              <span class="project-tag">Laravel</span>
              <span class="project-tag">PHP</span>
              <span class="project-tag">Bootstrap</span>
            </div>
            <div class="project-links">
              <a href="#" aria-label="Live demo"><i class="bi bi-box-arrow-up-right"></i></a>
              <a href="#" aria-label="Source code"><i class="bi bi-github"></i></a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-6 col-lg-4">
        <div class="project-card">
          <div class="project-img-wrap">
            <img src="https://placehold.co/600x400/12161F/4C8DFF?text=Portfolio+Site" alt="Portfolio Website">
          </div>
          <div class="p-4">
            <h5 class="mb-2">Personal Portfolio Website</h5>
            <p class="text-secondary small mb-3">This website you're seeing right now. Built with HTML, CSS, Bootstrap and a bit of JavaScript.</p>
            <div class="mb-3">
              <span class="project-tag">HTML/CSS</span>
              <span class="project-tag">Bootstrap</span>
              <span class="project-tag">JavaScript</span>
            </div>
            <div class="project-links">
              <a href="#" aria-label="Live demo"><i class="bi bi-box-arrow-up-right"></i></a>
              <a href="#" aria-label="Source code"><i class="bi bi-github"></i></a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-6 col-lg-4">
        <div class="project-card">
          <div class="project-img-wrap">
            <img src="https://placehold.co/600x400/12161F/4C8DFF?text=Blog+System" alt="Blog System">
          </div>
          <div class="p-4">
            <h5 class="mb-2">Simple Blog System</h5>
            <p class="text-secondary small mb-3">A basic blog platform with admin panel built using CodeIgniter.</p>
            <div class="mb-3">
              <span class="project-tag">CodeIgniter</span>
              <span class="project-tag">PHP</span>
              <span class="project-tag">MySQL</span>
            </div>
            <div class="project-links">
              <a href="#" aria-label="Live demo"><i class="bi bi-box-arrow-up-right"></i></a>
              <a href="#" aria-label="Source code"><i class="bi bi-github"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- CONTACT -->
<section id="contact">
  <div class="container">
    <div class="section-eyebrow mb-2">Contact</div>
    <h2 class="section-title mb-5">Give me a shot?</h2>

    <div class="row g-4">
      <div class="col-lg-7">
        @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
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
                required>
        </div>

        <div class="col-md-6">
            <label for="email" class="form-label small text-secondary mono">Email</label>
            <input
                type="email"
                class="form-control"
                id="email"
                name="email"
                value="{{ old('email') }}"
                placeholder="you@example.com"
                required>
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
                required>
        </div>

        <div class="col-12">
            <label for="message" class="form-label small text-secondary mono">Message</label>
            <textarea
                class="form-control"
                id="message"
                name="message"
                rows="5"
                placeholder="Tell me about your project..."
                required>{{ old('message') }}</textarea>
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
              <div>boringotr@gmail.com</div>
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
              <div>+63 900 000 0000</div>
            </div>
          </div>

          <hr style="border-color: var(--border);">

          <div class="text-secondary small mono mb-3">Find me on</div>
          <div class="d-flex gap-3">
            <a href="#" class="social-icon" aria-label="GitHub"><i class="bi bi-github"></i></a>
            <a href="#" class="social-icon" aria-label="LinkedIn"><i class="bi bi-linkedin"></i></a>
            <a href="#" class="social-icon" aria-label="X / Twitter"><i class="bi bi-twitter-x"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- FOOTER -->
<footer>
  <div class="container d-flex flex-column flex-md-row justify-content-between align-items-center gap-3">
    <div>© 2026 Rudy Boringot. All rights reserved.</div>
    <a href="#hero" class="back-to-top" aria-label="Back to top"><i class="bi bi-arrow-up"></i></a>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>