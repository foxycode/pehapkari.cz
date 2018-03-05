<?php declare(strict_types=1);

namespace Pehapkari\Website\Statie\Generator;

use DateTime;
use DateTimeInterface;
use Symplify\Statie\Renderable\File\AbstractFile;

final class LectureFile extends AbstractFile
{
    public function isActive(): bool
    {
        if (! $this->getDateTime()) {
            return false;
        }

        return $this->getDateTime() > new DateTime();
    }

    public function getName(): string
    {
        return $this->configuration['name'];
    }

    public function getImage(): ?string
    {
        return $this->configuration['image'] ?? null;
    }

    public function getFormLink(): ?string
    {
        return $this->configuration['form_link'] ?? null;
    }

    public function getUserId(): int
    {
        return (int) $this->configuration['user'];
    }

    public function getPerex(): ?string
    {
        return $this->configuration['perex'] ?? null;
    }

    public function getDateTime(): ?DateTimeInterface
    {
        if (isset($this->configuration['date'])) {
            if ($this->configuration['date'] instanceof DateTimeInterface) {
                return $this->configuration['date'];
            }

            return new DateTime($this->configuration['date']);
        }

        return null;
    }

    public function getHumanDate(): string
    {
        return $this->getDateTime()
            ->format('j. n. Y');
    }

    public function getFbEventLink(): ?string
    {
        return $this->configuration['fb_event'] ?? null;
    }
}
