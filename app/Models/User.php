<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Spatie\Permission\Traits\HasRoles;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Auth\Notifications\ResetPassword;

use Illuminate\Database\Eloquent\SoftDeletes;

#[Fillable(['name', 'email', 'password', 'telefono', 'direccion', 'fecha_nacimiento', 'email_verified_at'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable implements MustVerifyEmail
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable, HasRoles, SoftDeletes;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function clientBookings(){
        return $this->hasMany(Booking::class, 'client_id');
    }

    public function barberBookings(){
        return $this->hasMany(Booking::class, 'barber_id');
    }

    public function sendEmailVerificationNotification(): void
    {
        VerifyEmail::toMailUsing(function (object $notifiable, string $url) {
            return (new MailMessage)
                ->subject('¡Ya casi estás! Verifica tu correo en BarberShop')
                ->greeting('¡Hola, ' . $notifiable->name . '!')
                ->line('Gracias por registrarte en BarberShop. Para poder empezar a reservar tus citas y elegir a tu barbero favorito, necesitas verificar tu dirección de correo electrónico.')
                ->action('Verificar Correo Electrónico', $url)
                ->line('Si tú no has creado ninguna cuenta con nosotros, no te preocupes, puedes ignorar este correo tranquilamente.')
                ->salutation('Un saludo,' . "\n" . 'El equipo de BarberShop.');
        });

        $this->notify(new VerifyEmail);
    }

    public function sendPasswordResetNotification($token): void
    {
        ResetPassword::toMailUsing(function (object $notifiable, string $token) {
            // Generamos la URL oficial a la que debe ir el usuario para cambiar su clave
            $url = url(route('password.reset', [
                'token' => $token,
                'email' => $notifiable->getEmailForPasswordReset(),
            ], false));

            return (new \Illuminate\Notifications\Messages\MailMessage)
                ->subject('Restablece tu contraseña - BarberShop')
                ->greeting('¡Hola, ' . $notifiable->name . '!')
                ->line('Has recibido este correo porque hemos detectado una solicitud para restablecer la contraseña de tu cuenta en BarberShop.')
                ->action('Restablecer Contraseña', $url)
                ->line('Este enlace para restablecer la contraseña caducará en 60 minutos.')
                ->line('Si tú no has solicitado este cambio, puedes ignorar este mensaje; nadie podrá acceder a tu cuenta.')
                ->salutation('Un saludo,' . "\n" . 'El equipo de BarberShop.');
        });

        $this->notify(new ResetPassword($token));
    }
}
