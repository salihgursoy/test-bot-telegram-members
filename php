<?php

class TgMember
{
    public $id;
    public $username;
    public $first_name;
    public $last_name;
    public $is_bot;
    public $status;

    public function __construct($id, $username, $first_name, $last_name, $is_bot = false, $status = "member")
    {
        $this->id = $id;
        $this->username = $username;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->is_bot = $is_bot;
        $this->status = $status;
    }

    public function getFullName()
    {
        return trim($this->first_name . " " . $this->last_name);
    }

    public function toArray()
    {
        return [
            "ID" => $this->id,
            "username" => $this->username,
            "first_name" => $this->first_name,
            "last_name" => $this->last_name,
            "is_bot" => $this->is_bot,
            "status" => $this->status
        ];
    }
}


class TgGroup
{
    private $members = [];

    public function addMember(TgMember $member)
    {
        $this->members[$member->id] = $member;
    }

    public function removeMember($ID)
    {
        if (isset($this->members[$ID])) {
            unset($this->members[$id]);
        }
    }

    public function getMember($id)
    {
        return $this->members[$id] ?? null;
    }

    public function getAllMembers()
    {
        return $this->members;
    }
}

$group = new TgGroup();

$user1 = new TgMember(123456, "user123", "Ali", "Yılmaz");
$user2 = new TgMember(789012, "coderbot", "Coder", "Bot", true, "administrator");

$group->addMember($user1);
$group->addMember($user2);

print_r($group->getAllMembers());

?>
