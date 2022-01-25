<?php

namespace App\Interfaces;

interface EventRepositoryInterface
{
    public function getAllEvents();
    public function getEventById($eventId);
    public function deleteEvent($eventId);
    public function createEvent(array $eventDetails);
    public function updateEvent($eventId, array $newDetails);
    public function getUpcomingEvent($event);
    public function getPreviousEvent($event);
    // public function getFulfilledOrders();
}
