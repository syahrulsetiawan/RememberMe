<?php

class notes_model
{
    private $table = 'notes';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllNotes($id)
    {
        $query = "SELECT * FROM notes WHERE id_account =" . $id . " AND archive = 0 AND trash = 0 ORDER BY id_note DESC";
        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function getAllNotification($id)
    {
        $query = "SELECT * FROM notes WHERE id_account =" . $id . " AND Notification = 1 ORDER BY id_note DESC";
        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function getAllArchieve($id)
    {
        $query = "SELECT * FROM notes WHERE id_account =" . $id . " AND archive = 1 ORDER BY id_note DESC";
        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function getAllTrash($id)
    {
        $query = "SELECT * FROM notes WHERE id_account =" . $id . " AND trash = 1 ORDER BY id_note DESC";
        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function addNewNote($id, $data)
    {
        $query = "INSERT INTO notes (title_note, main_note, kode_color, date_note, id_account) values (:title, :notes, :codeColor, :dateNote, :id)";
        $this->db->query($query);

        switch ($data['blnDate']) {
            case 'Januari':
                $data['blnDate'] = 1;
                break;
            case 'Februari':
                $data['blnDate'] = 2;
                break;
            case 'Maret':
                $data['blnDate'] = 3;
                break;
            case 'April':
                $data['blnDate'] = 4;
                break;
            case 'Mei':
                $data['blnDate'] = 5;
                break;
            case 'Juni':
                $data['blnDate'] = 6;
                break;
            case 'Juli':
                $data['blnDate'] = 7;
                break;
            case 'Agustus':
                $data['blnDate'] = 8;
                break;
            case 'September':
                $data['blnDate'] = 9;
                break;
            case 'Oktober':
                $data['blnDate'] = 10;
                break;
            case 'November':
                $data['blnDate'] = 11;
                break;
            case 'Desember':
                $data['blnDate'] = 12;
                break;
        }
        $date = date_create($data['thnDate'] . '-' . $data['blnDate'] . '-' . $data['tglDate']);
        $date = date_format($date, 'Y-m-d');

        $kode = "red-style";

        $title = htmlspecialchars($data['title_note']);
        $main = htmlspecialchars($data['main_note']);
        $this->db->bind('title', $title);
        $this->db->bind('notes', $main);
        $this->db->bind('codeColor', $data['codeColor']);
        $this->db->bind('dateNote', $date);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function removeNoteFromTrash($idNote)
    {
        $query = "UPDATE " . $this->table . " SET trash = 0 WHERE id_note = :idNote";
        $this->db->query($query);

        $this->db->bind('idNote', $idNote);
        $this->db->execute();
    }
    public function deleteNote($idNote)
    {
        $query = "DELETE FROM " . $this->table . " WHERE id_note = :idNote";
        $this->db->query($query);

        $this->db->bind('idNote', $idNote);
        $this->db->execute();
    }

    public function moveNoteToTrash($IDNOTE)
    {
        $query = "UPDATE " . $this->table . " SET trash = 1, Notification = 0, archive = 0 WHERE id_note = :idNote";
        $this->db->query($query);

        $this->db->bind('idNote', $IDNOTE);
        $this->db->execute();
    }
    public function moveNoteToArchive($IDNOTE)
    {
        $query = "UPDATE " . $this->table . " SET archive = 1 WHERE id_note = :idNote";
        $this->db->query($query);

        $this->db->bind('idNote', $IDNOTE);
        $this->db->execute();
    }

    public function removeNoteFromArchive($IDNOTE)
    {
        $query = "UPDATE " . $this->table . " SET archive = 0 WHERE id_note = :idNote";
        $this->db->query($query);

        $this->db->bind('idNote', $IDNOTE);
        $this->db->execute();
    }
    public function updateNote($idNote, $data)
    {
        $query = "UPDATE " . $this->table . " SET title_note = :titleNote, main_note = :mainNote WHERE id_note = :idNote";
        $this->db->query($query);

        $title = htmlspecialchars($data['titleNote']);
        $main = htmlspecialchars($data['mainNote']);
        $this->db->bind('titleNote', $title);
        $this->db->bind('mainNote', $main);
        $this->db->bind('idNote', $idNote);

        $this->db->execute();
    }

    public function searchNote($id, $data)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE id_note LIKE :keyword OR title_note LIKE :keyword OR main_note LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->bind('keyword', "%$data%");
        $this->db->execute();
        return $this->db->resultSet();
    }
}
