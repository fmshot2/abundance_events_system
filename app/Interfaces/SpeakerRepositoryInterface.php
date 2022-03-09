<?php

namespace App\Interfaces;

interface SpeakerRepositoryInterface
{
    public function getAllSpeakers();
    public function getSpeakerById($SpeakerId);
    public function deleteSpeaker($SpeakerId);
    public function createSpeaker(array $SpeakerDetails);
    public function updateSpeaker($SpeakerId, array $newDetails);
}
