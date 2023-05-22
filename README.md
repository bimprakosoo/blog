<h1>Blog</h1>

<p>This project is a web application that consumes APIs from the API Service Blog to display and manage blog posts.</p>

<h2>Installation</h2>

<p>To get started with the project, follow these steps:</p>

<ol>
  <li>Clone the repository:</li>
  <pre><code>git clone https://github.com/bimprakosoo/blog.git</code></pre>

  <li>Change into the project directory:</li>
  <pre><code>cd blog</code></pre>

  <li>Install the dependencies using Composer:</li>
  <pre><code>composer install</code></pre>

  <li>Set up the configuration by copying the <code>.env.example</code> file to <code>.env</code>:</li>
  <pre><code>cp .env.example .env</code></pre>

  <li>Update the <code>.env</code> file with the necessary configuration, including the base URL of the First Project's APIs:</li>
  <pre><code>APP_URL=http://localhost:8000
API_BASE_URL=http://localhost:8000/api</code></pre>

  <li>Generate the application key:</li>
  <pre><code>php artisan key:generate</code></pre>
</ol>

<h2>Usage</h2>

<p>To use the application, follow these steps:</p>

<ol>
  <li>Start the local development server:</li>
  <pre><code>php artisan serve</code></pre>

  <li>Access the application in your web browser using the provided URL (e.g., <code>http://localhost:8000</code>).</li>

  <li>Register a new user account or log in using existing credentials.</li>

  <li>Explore the blog posts by navigating to the home page or specific post details.</li>

  <li>Optionally, you can submit comments for blog posts if you are logged in.</li>

  <li>Log out when you're done using the application.</li>
</ol>

<h2>License</h2>

<p>This project is licensed under the <a href="LICENSE">MIT License</a>.</p>
