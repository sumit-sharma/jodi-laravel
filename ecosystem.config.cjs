module.exports = {
  apps: [
    {
      name: "laravel-reverb",
      script: "php",
      args: "artisan reverb:start --host=0.0.0.0 --port=8080",
    },
    {
      name: "laravel-queue",
      script: "php",
      args: "artisan queue:work --tries=3",
    }
  ]
};