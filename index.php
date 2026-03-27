<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Portfolio | Nayla Camelia</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style.css" />
</head>

<body>
  <div id="app">

    <nav class="navbar navbar-expand-lg fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">Welcome to My Portofolio</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
          aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item"><a class="nav-link" href="#home">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
            <li class="nav-item"><a class="nav-link" href="#certificates">Certificates</a></li>
            <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <section id="home" class="hero">
      <div class="container">
        <div class="row align-items-center g-5">

          <div class="col-12 col-lg-7 order-2 order-lg-1">
            <p class="hero-greeting">Hello, I'm</p>
            <h1>{{ profile.name }}</h1>
            <p class="lead">{{ profile.tagline }}</p>
            <p class="desc-text">{{ profile.description }}</p>
            <div class="hero-btn d-flex flex-wrap gap-3 mt-4">
              <a href="#about" class="explore-btn">See More</a>
              <a href="#contact" class="contact-btn">Let's Connect</a>
            </div>
          </div>

          <div class="col-12 col-lg-5 order-1 order-lg-2 text-center text-lg-end">
            <div class="profile-layout d-inline-block">
              <div class="profile-box">
                <img src="assets/profile-pict.png" alt="Foto Profil">
              </div>
              <div class="float-badge badge-bottom">
                <i class="bi bi-briefcase-fill"></i>
                <span>Open to Internship</span>
              </div>
            </div>
          </div>

        </div>
      </div>
    </section>

    <section id="about" class="about-section py-5">
      <div class="container py-4">

        <div class="section-header mb-5">
          <p class="section-tag">Get to Know Me</p>
          <h2 class="section-title">About Me</h2>
          <div class="title-line"></div>
        </div>

        <div class="row g-4 align-items-start">
          <div class="col-12 col-lg-5">
            <div class="about-exp h-100">
              <h5 class="sub-heading">College Experience</h5>
              <div class="exp-list">
                <div class="exp-card" v-for="exp in experiences" :key="exp.role">
                  <span class="exp-tahun">{{ exp.year }}</span>
                  <p class="exp-role">{{ exp.role }}</p>
                  <span class="exp-tempat">{{ exp.place }}</span>
                </div>
              </div>
            </div>
          </div>

          <div class="col-12 col-lg-7">
            <div class="about-skill">
              <p class="about-desc">{{ profile.description_extra }}</p>
              <h5 class="sub-heading">Technical Skills</h5>

              <div class="row g-3 mb-4">
                <div class="col-12 col-md-6" v-for="skill in skills" :key="skill.name">
                  <div class="skill-item">
                    <div class="skill-header d-flex justify-content-between align-items-center mb-1">
                      <label class="skill-name">{{ skill.name }}</label>
                      <span class="skill-pct">{{ skill.level }}%</span>
                    </div>
                    <div class="progress" role="progressbar"
                      :aria-valuenow="skill.level" aria-valuemin="0" aria-valuemax="100">
                      <div class="progress-bar" :style="{ width: skill.level + '%' }"></div>
                    </div>
                  </div>
                </div>
              </div>

              <h5 class="sub-heading mt-4 mb-3">Tools I Use</h5>
              <div class="d-flex flex-wrap gap-2">
                <div class="tool-item" v-for="tool in tools" :key="tool.name">
                  <i class="bi tool-icon" :class="tool.icon"></i>
                  <span class="tool-name">{{ tool.name }}</span>
                </div>
              </div>

            </div>
          </div>

        </div>
      </div>
    </section>

    <section id="certificates" class="cert-section">
      <div class="container">

        <div class="section-header text-center mb-5">
          <p class="section-tag">My Learning Path</p>
          <h2 class="section-title">Certificates</h2>
          <div class="title-line mx-auto" style="margin-top: 1px;"></div>
          <p class="section-sub">{{ profile.cert_sub }}</p>
        </div>

        <div class="row g-4">
          <div class="col-12 col-md-6 col-lg-4" v-for="cert in certificates" :key="cert.title">
            <div class="card certificate-card h-100">
              <img :src="cert.image" class="card-img-top cert-img" alt="Certificate Image">
              <div class="card-body p-4">
                <p class="cert-issuer-label">{{ cert.issuer }}</p>
                <h5 class="card-title">{{ cert.title }}</h5>
                <p class="card-text">{{ cert.desc }}</p>
                <div class="cert-tags d-flex flex-wrap gap-1 mt-3">
                  <span class="cert-tag" v-for="tag in cert.tags" :key="tag">{{ tag }}</span>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section>

    <section id="contact" class="contact-section py-5">
      <div class="container py-4">
        <div class="row align-items-center g-5">

          <div class="col-12 col-lg-6">
            <p class="section-tag">Let's Talk</p>
            <h2 class="contact-heading">Have a project<br>in mind? 💌</h2>
            <p class="contact-sub">{{ profile.contact_sub }}</p>
            <div class="social-links d-flex flex-wrap gap-3 mt-4">
              <a :href="soc.link" target="_blank" class="social-btn"
                v-for="soc in socials" :key="soc.label">
                <i class="bi" :class="soc.icon"></i> {{ soc.label }}
              </a>
            </div>
          </div>

          <div class="col-12 col-lg-6">
            <div class="contact-card">
              <h6 class="contact-card-title">Quick Info</h6>
              <div class="contact-info-list">

                <div class="contact-info-item">
                  <div class="contact-info-icon">
                    <i class="bi bi-envelope-fill"></i>
                  </div>
                  <div>
                    <span class="contact-info-label">Email</span>
                    <span class="contact-info-value">{{ profile.email }}</span>
                  </div>
                </div>

                <div class="contact-info-item">
                  <div class="contact-info-icon">
                    <i class="bi bi-geo-alt-fill"></i>
                  </div>
                  <div>
                    <span class="contact-info-label">Location</span>
                    <span class="contact-info-value">{{ profile.location }}</span>
                  </div>
                </div>

                <div class="contact-info-item">
                  <div class="contact-info-icon">
                    <i class="bi bi-building-fill"></i>
                  </div>
                  <div>
                    <span class="contact-info-label">Campus</span>
                    <span class="contact-info-value">{{ profile.campus }}</span>
                  </div>
                </div>

              </div>
              <div class="availability-badge mt-4">
                <span class="avail-dot"></span>
                Currently available for internship &amp; freelance projects
              </div>
            </div>
          </div>

        </div>
      </div>
    </section>

    <footer>
      <div class="container">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 py-2">
          <p class="footer-copy mb-0">© 2026 — {{ profile.name }}</p>
          <a href="#home" class="footer-top">Back to top ↑</a>
        </div>
      </div>
    </footer>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>

  <script>
    const {
      createApp
    } = Vue;

    createApp({
      data() {
        return {
          profile: {},
          experiences: [],
          skills: [],
          certificates: [],
          socials: [],

          tools: [{
              name: "VS Code",
              icon: "bi-code-square"
            },
            {
              name: "Google Collab",
              icon: "bi-code"
            },
            {
              name: "Figma",
              icon: "bi-vector-pen"
            },
            {
              name: "Data Modeler",
              icon: "bi-database"
            },
            {
              name: "Microsoft Office",
              icon: "bi-microsoft"
            },
            {
              name: "Notion",
              icon: "bi-journal-text"
            },
          ],
        };
      },

      async mounted() {
        await this.loadAllData();
      },

      methods: {
        async loadAllData() {
          try {
            const [profile, experiences, skills, certificates, socials] = await Promise.all([
              fetch('api.php?section=profile').then(r => r.json()),
              fetch('api.php?section=experiences').then(r => r.json()),
              fetch('api.php?section=skills').then(r => r.json()),
              fetch('api.php?section=certificates').then(r => r.json()),
              fetch('api.php?section=socials').then(r => r.json()),
            ]);
            
            this.profile = profile;
            this.experiences = experiences;
            this.skills = skills;
            this.socials = socials;
            this.certificates = certificates;

          } catch (error) {
            console.error('Gagal memuat data dari database:', error);
          }
        },
      },

    }).mount('#app');
  </script>

</body>

</html>