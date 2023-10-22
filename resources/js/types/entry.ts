export type Entry = {
  id?: Number;
  first_name?: String;
  last_name?: String;
  full_name?: String;
  first_name_kana?: String;
  last_name_kana?: String;
  phase_id?: Number;
  phase_name?: String;
  status_id?: Number;
  status_name?: String;
  mail?: String;
  birth_day?: String;
  post_code?: String;
  address?: String;
  phone?: String;
  positions?: String;
  final_position?: String;
  join_day?: String;
  source_id?: Number;
  source_name?: String;
  free_message?: String;
  image?: String;
  created_at?: String;
  updated_at?: String;
  deleted_at?: String;
  next_action_day?: String;
  message?: String;
};

export type Judge = {
  id: Number;
  entry_id: Number;
  phase_id: Number;
  phase_name: String;
  status_id: Number;
  next_action_day: String;
  message: String;
};
